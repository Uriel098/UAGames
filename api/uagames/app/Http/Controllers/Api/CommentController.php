<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function list(){
        $comments = comment::all();
    
        $list = [];

        foreach($comments as $comment) {
            $object = [    
                "id"=> $comment->id,
                "name"=> $comment->name,
                "message"=> $comment->message,
                "created"=> $comment->created_ad,
                "updated"=> $comment->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $comment = comment::where('id','=',$id)->first();
        //dumpOrDie var_dump()

        $object = [    
            "id"=> $comment->id,
            "name"=> $comment->name,
            "message"=> $comment->message,
            "created"=> $comment->created_ad,
            "updated"=> $comment->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'message' => 'required|min:10',
        ]);
        $comment = comment::create([
            'name' => $data['name'],
            'message' => $data['message'],
        ]);
        if($comment){
        $object =[
            "response"=>'Success. Comment created',
            "data"=> $comment
        ];
        return response()->json($object);
        }else{
            $object =[
                "response"=>'Error. Comment not created',
                "data"=> $comment
            ];
            return response()->json($object);    
        }
        }
    public function update(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'message' => 'required|min:10',
        ]);
        $comment = comment::where('id','=',$id)->first();
        $comment->name = $data['name'];
        $comment->message = $data['message'];
        if($comment->update()){
            $object =[
                "response"=>'Success. Comment updated',
                "data"=> $comment
            ];
            return response()->json($object);
        }else{
            $object =[
                "response"=>'Error. Comment not updated',
                "data"=> $comment
            ];
            return response()->json($object);    
        }
    }
}