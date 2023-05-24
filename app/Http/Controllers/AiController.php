<?php

namespace App\Http\Controllers;

use App\Models\Ai;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function storeing (Request $request){

        $data = $request->validate([
            'Expected_consumption' => 'required',
            'expected_money' => 'required',
            'co2_saving'=>'required',

        ]);

        $Ai = Ai::create($data);

        return response()->json([
            'message' => ' stored successfully',
            'item' => $Ai
        ], 201);
    }

    public function showing (){
        $alls=Ai::all();
        return response()->json($alls, 200);


    }


}
