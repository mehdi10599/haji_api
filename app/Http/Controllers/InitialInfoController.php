<?php

namespace App\Http\Controllers;

use App\Models\InitialInfo;
use Illuminate\Http\Request;

class InitialInfoController extends Controller
{
    public function show($initialInfoId)
    {
        $initialInfo = InitialInfo::where('id',$initialInfoId)->first();
        if($initialInfo == null){
            return response()->json(['message' => 'Not Found.'], 404);
        }else{
            return response()->json($initialInfo,200);
        }

    }

    public function create(Request $request)
    {
        try {
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
                'categoryTitle' => 'required|string|max:255',
                'specialTitle' => 'required|string|max:255',
            ]);

            $initialInfo = new InitialInfo();
            $initialInfo->name = $request->name;
            $initialInfo->family = $request->family;
            $initialInfo->province = $request->province;
            $initialInfo->image = $request->image;
            $initialInfo->fatherName = $request->fatherName;
            $initialInfo->birthDay = $request->birthDay;
            $initialInfo->birthLocation = $request->birthLocation;
            $initialInfo->age = $request->age;
            $initialInfo->decade = $request->decade;
            $initialInfo->religious = $request->religious;
            $initialInfo->maritalStatus = $request->maritalStatus;
            $initialInfo->special = $request->special;
            $initialInfo->category = $request->category;
            $initialInfo->categoryTitle = $request->categoryTitle;
            $initialInfo->specialTitle = $request->specialTitle;


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
                'categoryTitle' => 'required|string|max:255',
                'specialTitle' => 'required|string|max:255',
            ]);

            $initialInfo->name = $request->name;
            $initialInfo->family = $request->family;
            $initialInfo->province = $request->province;
            $initialInfo->image = $request->image;
            $initialInfo->fatherName = $request->fatherName;
            $initialInfo->birthDay = $request->birthDay;
            $initialInfo->birthLocation = $request->birthLocation;
            $initialInfo->age = $request->age;
            $initialInfo->decade = $request->decade;
            $initialInfo->religious = $request->religious;
            $initialInfo->maritalStatus = $request->maritalStatus;
            $initialInfo->special = $request->special;
            $initialInfo->category = $request->category;
            $initialInfo->categoryTitle = $request->categoryTitle;
            $initialInfo->specialTitle = $request->specialTitle;

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
                $initialInfo->delete();
                return response()->json(['message'=>'field has been deleted ',],200);
            }
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }
}
