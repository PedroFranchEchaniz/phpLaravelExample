<?php

namespace App\http\Controllers;

use App\Models\Player;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //recuperar players
    public function index(){

        $players = Player::all();
        return response()->json(players);
    }

    //guardar player
    public function store (Request $request){
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string'
        ]);

        $player = Player::create($validateData);

        return response()->json($player, 201);
    }

    //obtener un player
    public function show(Player $player){
        return response()->json($player);
    }

    //editar un player
    public function update (Request $request, Player $player){
        $validateData = $request ->validate([
            'name' => 'required|string',
            'email' => 'required|string'
        ]);

        $player -> update ($validateData);
        return response()->json($player, 200);
    }

    //eliminar un player
}