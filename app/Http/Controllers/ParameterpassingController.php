<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ParameterpassingController extends Controller
{

    public function passparams($param1, $param2)
    {
        // // Return a response with the passed parameters
        // return response()->json([
        //     'parameter1' => $param1,
        //     'parameter2' => $param2,
        // ]);

        $arrayData = array("Volvo", "BMW", "Toyota");
        return view('parameterpassing', compact('param1', 'param2', 'arrayData'));
    }

}
