<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function postRegister(Request $request){
        $data = $request->all();
        return response()->json([$data], 200);
    }
}
