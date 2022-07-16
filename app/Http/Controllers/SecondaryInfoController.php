<?php

namespace App\Http\Controllers;

use App\Models\SecondaryInfo;
use Illuminate\Http\Request;

class SecondaryInfoController extends Controller
{
    public function show($shahidId)
    {
        $secondaryInfo = SecondaryInfo::where('shahidId',$shahidId)->first();
        if($secondaryInfo == null){
            return response()->json(['message' => 'Not Found.'], 404);
        }else{
            return response()->json($secondaryInfo,200);
        }

    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'shahidId' => 'required|integer',
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
            ]);

            $secondaryInfo = new SecondaryInfo();
            $secondaryInfo->shahidId = $request->shahidId;
            $secondaryInfo->nationality = $request->nationality;
            $secondaryInfo->dispatchGroup = $request->dispatchGroup;
            $secondaryInfo->militaryResponsibility = $request->militaryResponsibility;
            $secondaryInfo->militaryDegree = $request->militaryDegree;
            $secondaryInfo->education = $request->education;
            $secondaryInfo->nickname = $request->nickname;
            $secondaryInfo->biography = $request->biography;
            $secondaryInfo->testament = $request->testament;
            $secondaryInfo->shahadatDate = $request->shahadatDate;
            $secondaryInfo->shahadatLocation = $request->shahadatLocation;
            $secondaryInfo->shahadatOperationName = $request->shahadatOperationName;
            $secondaryInfo->shahadatDescription = $request->shahadatDescription;
            $secondaryInfo->memoryTitle = $request->memoryTitle;
            $secondaryInfo->memoryDescription = $request->memoryDescription;


            $secondaryInfo->save();
            return response()->json(['message'=>'new field has been created ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }

    }

    public function update(Request $request,$secondaryInfoId)
    {
        try {
            $secondaryInfo = SecondaryInfo::where('id',$secondaryInfoId)->first();
            $request->validate([
                'shahidId' => 'required|int',
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
            ]);

            $secondaryInfo->shahidId = $request->shahidId;
            $secondaryInfo->nationality = $request->nationality;
            $secondaryInfo->dispatchGroup = $request->dispatchGroup;
            $secondaryInfo->militaryResponsibility = $request->militaryResponsibility;
            $secondaryInfo->militaryDegree = $request->militaryDegree;
            $secondaryInfo->education = $request->education;
            $secondaryInfo->nickname = $request->nickname;
            $secondaryInfo->biography = $request->biography;
            $secondaryInfo->testament = $request->testament;
            $secondaryInfo->shahadatDate = $request->shahadatDate;
            $secondaryInfo->shahadatLocation = $request->shahadatLocation;
            $secondaryInfo->shahadatOperationName = $request->shahadatOperationName;
            $secondaryInfo->shahadatDescription = $request->shahadatDescription;
            $secondaryInfo->memoryTitle = $request->memoryTitle;
            $secondaryInfo->memoryDescription = $request->memoryDescription;

            $secondaryInfo->save();
            return response()->json(['message'=>'field has been updated ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }

    public function delete($shahidId)
    {
        try {
            $secondaryInfo = SecondaryInfo::where('shahidId',$shahidId)->first();
            if($secondaryInfo == null){
                return response()->json(['message' => 'Not Found.'], 404);
            }else{
                $secondaryInfo->delete();
                return response()->json(['message'=>'field has been deleted ',],200);
            }
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }
}
