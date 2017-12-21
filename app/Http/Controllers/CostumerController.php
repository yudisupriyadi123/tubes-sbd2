<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostumerController extends Controller
{
    //
    function index()
    {
    	return view('costumer/index');
    }
}
