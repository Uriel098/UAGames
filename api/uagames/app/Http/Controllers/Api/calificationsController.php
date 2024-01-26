<?php

namespace App\Http\Controllers\Api;

use App\Models\Calification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class calificationscontroller extends Controller
{
    public function list(){
        $califications = calification::all();
    
        $list = [];

        foreach($califications as $calification) {
            $object = [    
                "id"=> $calification->id,
                "vote"=> $calification->vote,
                "user"=> $calification->user,
                "created"=> $calification->created_ad,
                "updated"=> $calification->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $calification = calification::where('id','=',$id)->first();
        //dumpOrDie var_dump()

        $object = [    
            "id"=> $calification->id,
            "vote"=> $calification->vote,
            "user"=> $calification->user,
            "created"=> $calification->created_ad,
            "updated"=> $calification->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
    $data = $request->validate([
        "name"=> $data,"required|min:3",
        "price"=> "required",
    ]);
    $calification = Calification::create([
        "name"=> $data ["name"],
        "price"=> $data["price"],
    ]);
    if($calification->update()){
        $object = [
            "response" => "Succes. Items is correct",
            "date" => "$calification"
        ];
    }else{
        $object = [
            "response" => "Error: something went wrong, pleasetry again."
        ];
        return response()->json($object);
    }
    }
}