<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // ! mengarahkan ke view userHome lewat method index()
    public function index()
    {
        return view('user.userHome');
    }
}
