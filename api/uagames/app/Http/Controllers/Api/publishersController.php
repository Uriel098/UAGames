<?php

namespace App\Http\Controllers\Api;
use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class publishersController extends Controller
{
    public function list(){
        $publishers = publisher::all();
    
        $list = [];

        foreach($publishers as $publisher) {
            $object = [    
                "id"=> $publisher->id,
                "name"=> $publisher->review,
                "location"=> $publisher->image,
                "created"=> $publisher->created_ad,
                "updated"=> $publisher->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $publisher = publisher::where('id','=',$id)->first();
        //dumpOrDie var_dump()

        $object = [    
            "id"=> $publisher->id,
                "name"=> $publisher->review,
                "location"=> $publisher->image,
                "created"=> $publisher->created_ad,
                "updated"=> $publisher->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'location' => 'required|min:3',
        ]);
        $publisher = publisher::create([
            'name' => $data['name'],
            'location' => $data['location'],
        ]);
        if($publisher){
            $object=[
                "response"=> "publisher created",
                "data"=> $publisher
            ];
        } else {
            $object=[
                "response"=> "publisher not created",
                "data"=> $publisher
            ];
        }
    }
    public function update(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'location' => 'required|min:3',
        ]);
        $publisher = publisher::where('id','=',$id)->first();
        $publisher->name = $data['name'];
        $publisher->location = $data['location'];

        if($publisher->update()){
            $object=[
                "response"=> "publisher updated",
                "data"=> $publisher
            ];
        } else {
            $object=[
                "response"=> "publisher not updated",
                "data"=> $publisher
            ];
        }
    }
}