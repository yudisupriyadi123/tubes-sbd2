<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index()
    {
    	return view('admin/dashboard', ['title' => 'Dashboard']);
    }
    function dashboard()
    {
    	return view('admin/dashboard', ['title' => 'Dashboard']);
    }
    function post()
    {
    	return view('admin/post', ['title' => 'Add Product']);
    }
}
