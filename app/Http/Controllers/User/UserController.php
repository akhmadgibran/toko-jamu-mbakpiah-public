<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // ! mengarahkan ke view dashboard lewat method index()
    public function index()
    {
        return view('dashboard');
    }
}
