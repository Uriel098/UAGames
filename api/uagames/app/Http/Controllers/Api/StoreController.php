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
                "available"=> $store->available,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $store = Store::where('id','=',$id)->first();

        $object = [    
            "id"=> $store->id,
            "review"=> $store->review,
            "image"=> $store->image,
            "synopsis"=> $store->synopsis,
            "name"=> $store->name,
            "vote"=> $store->vote,
            "price"=> $store->price,
            "created"=> $store->created_ad,
            "updated"=> $store->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $store = request->validate([
            "name"=> "required|min:3",
            "location"=> "required|min:3",
            "available"=> "required|min:3",
        ]);
        $store = Store::create([
            "name"=> $data["name"],
            "location"=> $data["location"],
            "available"=> $data["available"],
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
            "available"=> "required|min:3",
        ]);
        $store = Store::where('id','=',$id)->first();
        $store->name = $data["name"];
        $store->location = $data["location"];
        $store->available = $data["available"];

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