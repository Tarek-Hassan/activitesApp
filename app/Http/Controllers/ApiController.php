<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class ApiController extends Controller
{
    //
    public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    protected function registered(Request $request, $user)
{
    $user->generateToken();

    return response()->json(['data' => $user->toArray()], 201);
}
    public function login(){ 
        
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            
            $user = Auth::user(); 
            $user->generateToken();
            return response()->json([
                'data' => $user->toArray(),
            ]);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
}
