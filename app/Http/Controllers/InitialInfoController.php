<?php

namespace App\Http\Controllers;

use App\Models\ImageCollection;
use App\Models\InitialInfo;
use Illuminate\Http\Request;

class InitialInfoController extends Controller
{
    public function show($initialInfoId)
    {
        try {
            $initialInfo = InitialInfo::where('id',$initialInfoId)->first();
            if($initialInfo == null){
                return response()->json(['message' => 'Not Found.'], 404);
            }else{
                $allImages = ImageCollection::whereBelongsTo($initialInfo)->get();
                $coverImage = '';
                $circleImage = '';
                $collectionImages = [];
                foreach($allImages as $image){
                    if($image['imageField'] == 'cover'){
                        $coverImage = 'storage/app/public/'.$image['imageAddress'];
                    }else if($image['imageField'] == 'collection'){
                        $collectionImages[] = 'storage/app/public/'.$image['imageAddress'];
                    }else if($image['imageField'] == 'circle'){
                        $circleImage = 'storage/app/public/'.$image['imageAddress'];
                    }
                }
                $initialInfo['coverImage'] = $coverImage;
                $initialInfo['circleImage'] = $circleImage;
                $initialInfo['collectionImages'] = $collectionImages;
                return response()->json([$initialInfo],200);
            }
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }


    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'family' => 'required|string|max:255',
                'province' => 'required|string|max:255',
                'fatherName' => 'required|string|max:255',
                'birthDay' => 'required|string|max:255',
                'birthLocation' => 'required|string|max:255',
                'age' => 'required|int',
                'decade' => 'required|int',
                'religious' => 'required|string|max:255',
                'maritalStatus' => 'required|bool',
                'special' => 'required|bool',
                'category' => 'required|string|max:255',
                'nationality' => 'required|string|max:255',
                'dispatchGroup' => 'required|string|max:255',
                'militaryResponsibility' => 'required|string|max:255',
                'militaryDegree' => 'required|string|max:255',
                'education' => 'required|string|max:255',
                'nickname' => 'required|string|max:255',
                'biography' => 'required|string',
                'testament' => 'required|string',
                'shahadatDate' => 'required|string|max:255',
                'shahadatLocation' => 'required|string|max:255',
                'shahadatOperationName' => 'required|string|max:255',
                'shahadatDescription' => 'required|string',
                'memoryTitle' => 'required|string|max:255',
                'memoryDescription' => 'required|string',
                'mazarNo' => 'required|string',
                'tombPiece' => 'required|string',
                'graveSite' => 'required|string',
                'bodyPosition' => 'required|string',
                'rowOfTombs' => 'required|string',
            ]);

            $initialInfo = new InitialInfo();
            $initialInfo->name = $request->name;
            $initialInfo->family = $request->family;
            $initialInfo->province = $request->province;
            $initialInfo->fatherName = $request->fatherName;
            $initialInfo->birthDay = $request->birthDay;
            $initialInfo->birthLocation = $request->birthLocation;
            $initialInfo->age = $request->age;
            $initialInfo->decade = $request->decade;
            $initialInfo->religious = $request->religious;
            $initialInfo->maritalStatus = $request->maritalStatus;
            $initialInfo->special = $request->special;
            $initialInfo->category = $request->category;
            $initialInfo->categoryTitr = $request->categoryTitr;
            $initialInfo->specialTitr = $request->specialTitr;
            $initialInfo->nationality = $request->nationality;
            $initialInfo->dispatchGroup = $request->dispatchGroup;
            $initialInfo->militaryResponsibility = $request->militaryResponsibility;
            $initialInfo->militaryDegree = $request->militaryDegree;
            $initialInfo->education = $request->education;
            $initialInfo->nickname = $request->nickname;
            $initialInfo->biography = $request->biography;
            $initialInfo->testament = $request->testament;
            $initialInfo->shahadatDate = $request->shahadatDate;
            $initialInfo->shahadatLocation = $request->shahadatLocation;
            $initialInfo->shahadatOperationName = $request->shahadatOperationName;
            $initialInfo->shahadatDescription = $request->shahadatDescription;
            $initialInfo->memoryTitle = $request->memoryTitle;
            $initialInfo->memoryDescription = $request->memoryDescription;
            $initialInfo->mazarNo = $request->mazarNo;
            $initialInfo->tombPiece = $request->tombPiece;
            $initialInfo->graveSite = $request->graveSite;
            $initialInfo->bodyPosition = $request->bodyPosition;
            $initialInfo->rowOfTombs = $request->rowOfTombs;


            $initialInfo->save();
            return response()->json(['message'=>'new field has been created ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }

    }

    public function update(Request $request,$initialInfoId)
    {
        try {
            $initialInfo = InitialInfo::where('id',$initialInfoId)->first();
            $request->validate([
                'name' => 'required|string|max:255',
                'family' => 'required|string|max:255',
                'province' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'fatherName' => 'required|string|max:255',
                'birthDay' => 'required|string|max:255',
                'birthLocation' => 'required|string|max:255',
                'age' => 'required|int',
                'decade' => 'required|int',
                'religious' => 'required|string|max:255',
                'maritalStatus' => 'required|bool',
                'special' => 'required|bool',
                'category' => 'required|string|max:255',
                'nationality' => 'required|string|max:255',
                'dispatchGroup' => 'required|string|max:255',
                'militaryResponsibility' => 'required|string|max:255',
                'militaryDegree' => 'required|string|max:255',
                'education' => 'required|string|max:255',
                'nickname' => 'required|string|max:255',
                'biography' => 'required|string',
                'testament' => 'required|string',
                'shahadatDate' => 'required|string|max:255',
                'shahadatLocation' => 'required|string|max:255',
                'shahadatOperationName' => 'required|string|max:255',
                'shahadatDescription' => 'required|string',
                'memoryTitle' => 'required|string|max:255',
                'memoryDescription' => 'required|string',
                'mazarNo' => 'required|string',
                'tombPiece' => 'required|string',
                'graveSite' => 'required|string',
                'bodyPosition' => 'required|string',
                'rowOfTombs' => 'required|string',
            ]);

            $initialInfo->name = $request->name;
            $initialInfo->family = $request->family;
            $initialInfo->province = $request->province;
            $initialInfo->fatherName = $request->fatherName;
            $initialInfo->birthDay = $request->birthDay;
            $initialInfo->birthLocation = $request->birthLocation;
            $initialInfo->age = $request->age;
            $initialInfo->decade = $request->decade;
            $initialInfo->religious = $request->religious;
            $initialInfo->maritalStatus = $request->maritalStatus;
            $initialInfo->special = $request->special;
            $initialInfo->category = $request->category;
            $initialInfo->categoryTitr = $request->categoryTitr;
            $initialInfo->specialTitr = $request->specialTitr;
            $initialInfo->nationality = $request->nationality;
            $initialInfo->dispatchGroup = $request->dispatchGroup;
            $initialInfo->militaryResponsibility = $request->militaryResponsibility;
            $initialInfo->militaryDegree = $request->militaryDegree;
            $initialInfo->education = $request->education;
            $initialInfo->nickname = $request->nickname;
            $initialInfo->biography = $request->biography;
            $initialInfo->testament = $request->testament;
            $initialInfo->shahadatDate = $request->shahadatDate;
            $initialInfo->shahadatLocation = $request->shahadatLocation;
            $initialInfo->shahadatOperationName = $request->shahadatOperationName;
            $initialInfo->shahadatDescription = $request->shahadatDescription;
            $initialInfo->memoryTitle = $request->memoryTitle;
            $initialInfo->memoryDescription = $request->memoryDescription;
            $initialInfo->mazarNo = $request->mazarNo;
            $initialInfo->tombPiece = $request->tombPiece;
            $initialInfo->graveSite = $request->graveSite;
            $initialInfo->bodyPosition = $request->bodyPosition;
            $initialInfo->rowOfTombs = $request->rowOfTombs;

            $initialInfo->save();
            return response()->json(['message'=>'field has been updated ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }

    public function delete($initialInfoId)
    {
        try {
            $initialInfo = InitialInfo::where('id',$initialInfoId)->first();
            if($initialInfo == null){
                return response()->json(['message' => 'Not Found.'], 404);
            }else{
                ImageCollectionController::deleteImageByShahidId($initialInfoId);
                $initialInfo->delete();
                $initialInfo->images()->delete();
                return response()->json(['message'=>'field has been deleted ',],200);
            }
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }
}
