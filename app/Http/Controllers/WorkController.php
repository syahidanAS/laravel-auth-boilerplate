<?php

namespace App\Http\Controllers;
use App\Models\WorkModel;
use App\Models\WorkStackModel;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function store(Request $request){
        if($request->file('image_uri')){
            $file = $request->file('image_uri');
            $filename = date('YmdHi.') . $file->extension();
            $file->move(public_path('work/images'), $filename);
        }else{
            return response()->json([
                'message' => 'Image required',
            ], 400);
        }

        if(!$request->title){
            return response()->json([
                'message' => 'Title required',
            ], 400);
        }else if(!$request->desc){
            return response()->json([
                'message' => 'Description required',
            ], 400);
        }else if(!$request->url){
            return response()->json([
                'message' => 'Image required',
            ], 400);
        }else if(!$request->stack_id){
            return response()->json([
                'message' => 'Stack tidak boleh kosong',
            ], 400);
        }

        try{
        $work = new WorkModel;
        $work->title = $request->title;
        $work->desc = $request->desc;
        $work->url = $request->url;
        $work->image_uri = $filename;
        $work->image_url = url('/work/images/' . $filename);
        $work->isShowing = $request->isShowing;
        $work->isClicked = $request->isClicked;
        $work->save();

        $workStack = new WorkStackModel;
        $workStack->work_id = $work->id;
        $workStack->stack_id = $request->stack_id;
        $workStack->save();

        return response()->json([
            'message' => 'Data successfully created',
        ], 201);
        }catch(\Exception $e){
            
        return response()->json([
            'message' => 'Something went wrong',
        ], 500);
        }
 

    }
}
