<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getAllUsers(Request $request)
    {
        return User::where('id','<>',$request->user()->id)->get();
    }
    public function getLoggedInUser(Request $request)
    {
        return $request->user();
    }

}
