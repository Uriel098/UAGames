<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class gamescontroller extends Controller
{
    public function list(){
        $games = Game::all();
    
        $list = [];

        foreach($games as $game) {
            $object = [    
                "id"=> $game->id,
                "review"=> $game->review,
                "image"=> $game->image,
                "synopsis"=> $game->synopsis,
                "name"=> $game->name,
                "vote"=> $game->vote,
                "price"=> $game->price,
                "created"=> $game->created_ad,
                "updated"=> $game->create_ad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id){
        $game = Game::where('id','=',$id)->first();

        $object = [    
            "id"=> $game->id,
            "review"=> $game->review,
            "image"=> $game->image,
            "synopsis"=> $game->synopsis,
            "name"=> $game->name,
            "vote"=> $game->vote,
            "price"=> $game->price,
            "created"=> $game->created_ad,
            "updated"=> $game->create_ad,
        ];
        return response()->json($object);
    }
    public function create(Request $request){
      $data = $request->validate([
        'name' => 'required|min:3',
        'review' => 'required|min:3',
        'synopsis' => 'required|min:3',
        'vote' => 'required|min:3',
        'price' => 'required|min:3',
      ]);
      $game = Game::create([
        'name' => $data['name'],
        'review' => $data['review'],
        'synopsis' => $data['synopsis'],
        'vote' => $data['vote'],
        'price' => $data['price'],
      ]);
        if($game){
            $object=[
                "response" => "success. Item saved correctly",
            ];
            return response()->json($object);
        }else{
            $object=[
                "response" => "Error: Something went wrong, please try again.",
            ];
            return response()->json($object);
        }
        }
        public function update(Request $request){
            $data = $request->validate([
                'id' => 'required|min1',
                'name' => 'required|min:3',
                'review' => 'required|min:3',
                'synopsis' => 'required|min:3',
                'vote' => 'required|min:3',
                'price' => 'required|min:3',
            ]);
            $game = Game::where('id','=',$data['id'])->first();
            $game->name = $data['name'];
            $game->review = $data['review'];
            $game->synopsis = $data['synopsis'];
            $game->vote = $data['vote'];
            $game->price = $data['price'];
            if ($game->save()){
                $object=[
                    "response" => "success. Item saved correctly",
                    "data" => $game
                ];
                return response()->json($object);
            }else{
                $object=[
                    "response" => "Error: Something went wrong, please try again.",
                ];
                return response()->json($object);
            }
        }

}
