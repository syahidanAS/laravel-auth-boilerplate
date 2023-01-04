<?php

namespace App\Http\Controllers;
use App\Models\StackModel;

use Illuminate\Http\Request;

class StackController extends Controller
{
    public function index(){
        $result = StackModel::get();
        return $result;
    }
    public function store(Request $request){
        
        if(!$request->stack){
            return response()->json([
                'message' => 'Stack name required',
            ], 400);
        }else if(!$request->url){
            return response()->json([
                'message' => 'Url required',
            ], 400);
        }
        $payload = [
            "stack" => $request->stack,
            "url" => $request->url
        ];

        $result = StackModel::create($payload);

        if(!$result){
            return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }

        return response()->json([
            'message' => 'Data successfully created',
        ], 201);
    }

    public function destroy($id){
        if(!$id){
            return response()->json([
                'message' => 'Please put id of stack',
            ], 400);
        }
        $result = StackModel::destroy($id);
        if(!$result){
            return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }
        return response()->json([
            'message' => 'Data successfully deleted',
        ], 200);
    }
}
