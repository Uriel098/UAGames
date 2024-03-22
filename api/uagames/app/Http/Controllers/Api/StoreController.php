<?php

namespace App\Http\Controllers\Api;
use App\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function list(){
        $stores = Store::all();
    
        $list = [];

        foreach($stores as $store) {
            $object = [    
                "id"=> $store->id,
                "name"=> $store->name,
                "location"=> $store->location,
                "score"=> $store->score,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $store = Store::where('id','=',$id)->first();

        $object = [    
            "id"=> $store->id,            
            "name"=> $store->name,
            "location"=> $store->location,
            "score"=> $store->score,
            "created_at"=> $store->created_at,
            "updated_at"=> $store->update_at,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'score' => 'required|min:1',
        ]);
        $store = Store::create([
            "name"=> $data["name"],
            "location"=> $data["location"],
            "score"=> $data["score"],
        ]);
        if($store){
            $object=[
                "response"=> "store created",
                "data"=> $store
            ];
            return response()->json($object);
        }else{
            $object=[
                "response"=> "store not created",
                "data"=> $store
            ];
            return response()->json($object);
        }
        }
    public function update(Request $request, $id){
        $data = $request->validate([
            "name"=> "required|min:3",
            "location"=> "required|min:3",
            "score"=> "required|min:3",
        ]);
        $store = Store::where('id','=',$id)->first();
        $store->name = $data["name"];
        $store->location = $data["location"];
        $store->score = $data["score"];

        if($store->update()){
            $object=[
                "response"=> "store updated",
                "data"=> $store
            ];
            return response()->json($object);
        }else{
            $object=[
                "response"=> "store not updated",
                "data"=> $store
            ];
            return response()->json($object);                    
        }
    }
}