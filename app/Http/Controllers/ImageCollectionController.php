<?php

namespace App\Http\Controllers;

use App\Models\ImageCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageCollectionController extends Controller
{

    public function uploadImage(Request $request)
    {
        try{
            $this->validate($request, [
                'shahidId' => 'required|integer',
                'imageField' => 'required|string',
                'image' => 'required',
            ]);

            $imageField = $request->imageField;//cover and collection
            $shahidId = $request->shahidId;


//            $realImageName = $request->file('image')->getClientOriginalName();
            $imageDirectory = "images/".$shahidId."/".$imageField;
//            $data = base64_decode($request->image);
            $data = $request->image;

            $imageAddress = Storage::disk('public')->put($imageDirectory, $data);

            $imageCollection = new ImageCollection();
            $imageCollection->shahidId = $shahidId;
            $imageCollection->imageField = $imageField;
            $imageCollection->imageAddress = $imageAddress;
            $imageCollection->save();

            return response()->json(['imageAddress'=>'storage/app/public/'.$imageAddress,],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }

    }

    public function deleteImageById($id){
        try {
            $image = ImageCollection::where('id',$id)->first();
            if($image == null){
                return response()->json(['message' => 'Not Found.'], 404);
            }else{
                Storage::disk('public')->delete($image->imageAddress);
                $image->delete();
                return response()->json(['message'=>'field has been deleted ',],200);
            }
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }

    static public function deleteImageByShahidId($shahidId){
        try {
            $dir = 'public/images/'.$shahidId.'/';
            $res=Storage::deleteDirectory($dir);
            return response()->json(['message'=>'fields in '.$dir.' has been deleted res='.$res.' .',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }

}
