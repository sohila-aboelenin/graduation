<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use Illuminate\Http\Request;

class IotController extends Controller
{
    public function store (Request $request){

        $data = $request->validate([
            'device_one_consumption' => 'required',
            'device_two_consumption' => 'required',

        ]);

        $iot = Iot::create($data);

        return response()->json([
            'message' => ' stored successfully',
            'item' => $iot
        ], 201);
    }

    public function show(){
        $cons = Iot::all();
        return response()->json($cons, 200);
    }




    public function total()
    {
        $products = Iot::all();
        $totalValue = 0;

        foreach ($products as $product) {
            $totalValue = $product->device_one_consumption + $product->device_two_consumption;
        }

        return response()->json(['total_value' => $totalValue], 200);
    }

    function calculateElecOne($dev_one)
    {
        if ($dev_one <= 50) {
            $rate = 0.34;
        } elseif ($dev_one <= 100) {
            $rate = 0.58;
        } elseif ($dev_one <= 200) {
            $rate = 0.73;
        } elseif ($dev_one <= 350) {
            $rate = 1.03;
        } else {
            $rate = 1.45;
        }

        $cost = $dev_one * $rate ;
        return $cost;
    }

    public function DeviceOne(){
        $alls=Iot::all('device_one_consumption')->last();
        $dev=$alls->device_one_consumption;
        $pills= $this->calculateElecOne($dev);
        return response()->json(['$pill' => $pills],200);

    }

    public function deviceTwo(){
        $alls=Iot::all('device_two_consumption')->last();
        $dev_two=$alls->device_two_consumption;
        $pills= $this->calculateElecOne($dev_two);
        return response()->json(['$pill' => $pills],200);

    }


    public function totalMoney()
    {
        $products = Iot::all();
        $totalValue = 0;

        foreach ($products as $product) {
            $totalValue = $product->device_one_consumption + $product->device_two_consumption;
            if ($totalValue <= 50) {
                $rate = 0.34;
            } elseif ($totalValue <= 100) {
                $rate = 0.58;
            } elseif ($totalValue <= 200) {
                $rate = 0.73;
            } elseif ($totalValue <= 350) {
                $rate = 1.03;
            } else {
                $rate = 1.45;
            }

            $cost = $totalValue * $rate ;

        }
        return response()->json(['total_value' => $cost], 200);
    }



}
