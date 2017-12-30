<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostumerController extends Controller
{
    //
    function index()
    {
    	$iduser = session()->get('iduser');
    	if (!empty($iduser)) {
    		return view('costumer/index', ['title' => 'Costumer']);	
    	} else {
    		redirect(url('/'));
    	}
    }
    function costumer($idcostumer)
    {
    	return view('costumer/index', ['title' => 'Costumer '.$idcostumer]);
    }
}
