<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Donors()
    {
        $users = User::all();
        return response()->json($users,200);
    }
}
