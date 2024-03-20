<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list () {

        $Users = User::all();

        $list = [];

        foreach($Users as $User){

            $objetc = [

                "id" => $User->id,
                "name" => $User->name,
                "surname" => $User->surname,
                "email" => $User->email,
                "phone" => $User->phone,
                "email_verified_at" => $User->email_verified_at,
                "image" => $User->image,
                "remember_token" => $User->remember_token


            ];

            array_push($list,$objetc);
        }
        return response()->json($list);
    }
    public function item ($id) {

        $User = User::where('id','=',$id)->first();

        $object = [

            "id" => $User->id,
            "name" => $User->name,
            "surname" => $User->surname,
            "email" => $User->email,
            "phone" => $User->phone,
            "email_verified_at" => $User->email_verified_at,
            "image" => $User->image,
            "remember_token" => $User->remember_token

        ];

        return response()->json($object);

    }
    public function create(Request $request) {
        $data = $request->validate([
            'name'=> 'required|min:3,max:50',
            'surname'=> 'required|min:3,max:50',
            'email'=> 'required|min:1,max:50',
            'phone'=> 'required|min:1,max:50',
            'password'=> 'required|min:1,max:50',
            'image'=> 'required|min:1,max:50'
        ]);
        
        $User = User::create([
            'name'=> $data['name'],
            'surname'=> $data['surname'],
            'email'=> $data['email'],
            'phone'=> $data['phone'],
            'password'=> $data['password'],
            'image'=> $data['image']

        ]);

        if ($User) {
            $object = [

                "response" => 'Succes.Itemsaved correctly.',
                "data" => $User
    
            ];
    
            return response()->json($object);
        }else {
            $object = [

                "response" => 'Error:Something went wrong, please try again.',
    
            ];
    
            return response()->json($object);
        }

    }

    public function update(Request $request){
        $data = $request->validate([
            'name'=> 'required|min:3,max:50',
            'surname'=> 'required|min:3,max:50',
            'email'=> 'required|min:1,max:50',
            'phone'=> 'required|min:1,max:50',
            'password'=> 'required|min:1,max:50',
            'image'=> 'required|min:1,max:50'
            
        ]);
        
        $user = User::where("id","=", $data['id'])->first();
        $user->name=$data['name'];
        $user->surname=$data['surname'];
        $user->email=$data['email'];
        $user->phone=$data['phone'];
        $user->password=$data['password'];
        $user->image=$data['image'];
        
        if($user->update()){
            $object =[
            "response"=>'Sucess. Item update successfully.',
            "data"=> $user
            ];

            return response()->json($object);
        } else {
            $object = [

                "response" => 'Error:Something went wrong, please try again.',
    
            ];
    
            return response()->json($object);
        }
    }


}