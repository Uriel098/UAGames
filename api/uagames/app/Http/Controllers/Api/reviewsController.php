<?php

namespace App\Http\Controllers\Api;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reviewsController extends Controller
{
    public function list(){
        $reviews = Review::all();
    
        $list = [];

        foreach($reviews as $review) {
            $object = [    
                "id"=> $review->id,
                "name"=> $review->name,
                "lname"=> $review->lname,
                "date"=> $review->date,
                "name"=> $review->name,
                "phone"=> $review->phone,
                "mail"=> $review->mail,
                "created"=> $review->created_ad,
                "updated"=> $review->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $review = Review::where('id','=',$id)->first();
        //dumpOrDie var_dump()

        $object = [    
            "id"=> $review->id,
            "name"=> $review->name,
            "lname"=> $review->lname,
            "date"=> $review->date,
            "name"=> $review->name,
            "phone"=> $review->phone,
            "mail"=> $review->mail,
            "created"=> $review->created_ad,
            "updated"=> $review->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
        $data = $request->validate([
            "name"=> "required|min:3",
            "lname"=> "required|min:3",
            "date"=> "required|min:3",
            "name"=> "required|min:3",
            "phone"=> "required|min:3",
            "mail"=> "required|min:3",
        ]);
        $review = Review::create([
            "name"=> $data["name"],
            "lname"=> $data["lname"],
            "date"=> $data["date"],
            "name"=> $data["name"],
            "phone"=> $data["phone"],
            "mail"=> $data["mail"],
        ]);
        if($review){
            $object=[
                "response"=> "review created",
                "data"=> $review
            ];
        } else {
            $object=[
                "response"=> "review not created",
                "data"=> $review
            ];
        }
    }
    public function update(Request $request){
        $data = $request->validate([
            "name"=> "required|min:3",
            "lname"=> "required|min:3",
            "date"=> "required|min:3",
            "name"=> "required|min:3",
            "phone"=> "required|min:3",
            "mail"=> "required|min:3",
        ]);
        $review = Review::where('id','=',$id)->first();
        $review->name = $data['name'];
        $review->lname = $data['lname'];
        $review->date = $data['date'];
        $review->name = $data['name'];
        $review->phone = $data['phone'];
        $review->mail = $data['mail'];

        if($review->update()){
            $object=[
                "response"=> "review updated",
                "data"=> $review
            ];
        } else {
            $object=[
                "response"=> "review not updated",
                "data"=> $review
            ];
        }
    }
}
