<?php

namespace App\Http\Controllers\Api;
use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function list(){
        $publishers = Publisher::all();
    
        $list = [];

        foreach($publishers as $publisher) {
            $object = [    
                "id"=> $publisher->id,
                "name"=> $publisher->name,
                "location"=> $publisher->location,
                "image"=> $publisher->image,
                "created_at"=> $publisher->created_at,
                "updated_at"=> $publisher->create_at,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $publisher = Publisher::where('id','=',$id)->first();

        $object = [    
            "id"=> $publisher->id,
                "name"=> $publisher->name,
                "location"=> $publisher->location,
                "image"=> $publisher->image,
                "created_at"=> $publisher->created_at,
                "updated_at"=> $publisher->create_at,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'image'=>'required|min:3'
        ]);
        $publisher = Publisher::create([
            'name' => $data['name'],
            'location' => $data['location'],
            'image' => $data['image'],
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
            'id' => 'required|min:1',
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'image'=>'required|min:3'
        ]);
        $publisher = Publisher::where('id','=',$data['id'])->first();

        $publisher->name = $data['name'];
        $publisher->location = $data['location'];
        $publisher->image = $data['image'];
        $publisher->save();
        if($publisher){
            $object=[
                "response"=> 'publisher updated',
                "data"=> $publisher
            ];
            return response()->json($object);
        } else {
            $object=[
                "response"=> 'publisher not updated',
                "data"=> $publisher
            ];
            return response()->json($object);
        }
    }
    public function delete($id){
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        return response()->json(['response'=>'publisher deleted']);
    }
}
