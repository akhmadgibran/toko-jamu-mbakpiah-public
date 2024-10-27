<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    // ! method index untuk mengarahkan url admin/dashboard ke view admin/dashboard
    public function index()
    {
        // ! mengarahkan ke view admin.dashboard lewat method index()

        return view('admin.dashboard');
    }
}
