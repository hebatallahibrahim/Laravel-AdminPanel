<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        if(Auth::user()->role == '1' ){
            return view('admin.layouts.dashboard');
        } else {
            return view('admin.layouts.dashboard2');
        }

    }
}
