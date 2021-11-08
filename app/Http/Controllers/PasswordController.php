<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;

class PasswordController extends Controller
{
    /**
     *
     */
    public function passwordValidate(Request $request) {
        $request->user()->fill([
            'password' => Hash::make($request['password'])
        ]);
    }
    
}
