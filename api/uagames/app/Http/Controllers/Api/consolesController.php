<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Console;

class consolesController extends Controller
{
    public function list(){
        $consoles = Console::all();
    
        $list = [];

        foreach($consoles as $console) {
            $object = [    
                "id"=> $console->id,
                "name"=> $console->name,
                "price"=> $console->price,
                "vote"=> $console->vote,
                "review"=> $console->review,
                "location"=> $console->location,
                "image"=> $console->image,
                "created"=> $console->created_ad,
                "updated"=> $console->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $console = Console::where('id','=',$id)->first();
    

        $object = [    
            "id"=> $console->id,
                "name"=> $console->name,
                "price"=> $console->price,
                "vote"=> $console->vote,
                "review"=> $console->review,
                "location"=> $console->location,
                "image"=> $console->image,
                "created"=> $console->created_ad,
                "updated"=> $console->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'vote' => 'required|numeric',
            'review' => 'required|min:3',
            'location' => 'required|min:3',
        ]);
        $console = Console::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'vote' => $data['vote'],
            'review' => $data['review'],
            'location' => $data['location'],
        ]);
        if($console){
        $object =[
            "response"=>'Success. Console created',
            "data"=> $console
        ];
        return response()->json($object);
        }else{
            $object =[
                "response"=>'Error. Console not created',
                "data"=> $console
            ];
            return response()->json($object);
        }
    }
}