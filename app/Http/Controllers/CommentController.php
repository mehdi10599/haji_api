<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($shahidId)
    {
        $secondaryInfo = Comment::where('shahidId',$shahidId)->get();
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
                'userName' => 'required|string|max:255',
                'comment' => 'required|string',
            ]);

            $secondaryInfo = new Comment();
            $secondaryInfo->shahidId = $request->shahidId;
            $secondaryInfo->userName = $request->userName;
            $secondaryInfo->comment = $request->comment;


            $secondaryInfo->save();
            return response()->json(['message'=>'new field has been created ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }

    }

    public function update(Request $request,$id)
    {
        try {
            $secondaryInfo = Comment::where('id',$id)->first();
            $request->validate([
                'shahidId' => 'required|integer',
                'userName' => 'required|string|max:255',
                'comment' => 'required|string',
            ]);

            $secondaryInfo->shahidId = $request->shahidId;
            $secondaryInfo->userName = $request->userName;
            $secondaryInfo->comment = $request->comment;

            $secondaryInfo->save();
            return response()->json(['message'=>'field has been updated ',],200);
        }catch (\Exception $exception){
            return  response()->json(['message'=>[$exception->getMessage()]],500);
        }
    }

    public function delete($id)
    {
        try {
            $secondaryInfo = Comment::where('id',$id)->first();
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
