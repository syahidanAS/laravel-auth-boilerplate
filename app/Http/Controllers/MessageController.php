<?php

namespace App\Http\Controllers;
use App\Models\MessageModel;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){

        if(!$request->fullname){
            return response()->json([
                'message' => 'Full name required',
            ], 400);
        }else if(!$request->email){
            return response()->json([
                'message' => 'Email required',
            ], 400);
        }else if(!$request->subject){
            return response()->json([
                'message' => 'Subject required',
            ], 400);
        }else if(!$request->message){
            return response()->json([
                'message' => 'Message required',
            ], 400);
        }

        $result = MessageModel::create([
            "fullname"=>$request->fullname,
            "email" =>$request->email,
            "subject"=>$request->subject,
            "message"=>$request->message
        ]);

        if($result){
            return response()->json([
                'message' => 'Data successfuly added',
            ], 201);
        }
        return response()->json([
            'message' => 'Something went wrong',
        ], 403);
    }
}
