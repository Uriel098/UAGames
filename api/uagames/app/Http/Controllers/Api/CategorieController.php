<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Categoriecontroller extends Controller
{
    public function list(){
        $categories = categorie::all();
    
        $list = [];

        foreach($categories as $categorie) {
            $object = [    
                "id"=> $categorie->id,
                "name"=> $categorie->name,
                "filters"=> $categorie->filters,
                "created"=> $categorie->created_ad,
                "updated"=> $categorie->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $categorie = categorie::where('id','=',$id)->first();
        //dumpOrDie var_dump()

        $object = [    
            "id"=> $categorie->id,
                "name"=> $categorie->name,
                "filters"=> $categorie->filters,
                "created"=> $categorie->created_ad,
                "updated"=> $categorie->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
      $data = $request->validate([
            'name' => 'required',
            'filters' => 'required',
        ]);
        $categorie = categorie::create([
            'name' => $data['name'],
            'filters' => $data['filters'],
        ]);
        if($categorie){
            $object =[
                'response' => 'Success, Item saved correctly',
                "data" => $categorie
            ];
            return response()->json($object);
        }else{
            $object =[
                'response' => 'Error: Something went wrong, please try again',
                "data" => $categorie
            ];
            return response()->json($object);
        }
    }
    public function update(Request $request, $id){
        $data = $request->validate([
            'id' => 'required|min:1',
            'name' => 'required'|'min:3',
            'filters' => 'required|min:3',
        ]);
        $categorie = categorie::where('id','=',$id)->first();
        $categorie->name = $data['name'];
        $categorie->filters = $data['filters'];
        if($categorie->update()){
            $object =[
                'response' => 'Success, Item saved correctly',
                "data" => $categorie
            ];
            return response()->json($object);
        }else{
            $object =[
                'response' => 'Error: Something went wrong, please try again',
                "data" => $categorie
            ];
            return response()->json($object);
        }
    }
}
