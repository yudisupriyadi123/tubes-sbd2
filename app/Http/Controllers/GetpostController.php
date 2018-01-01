<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GetpostModel;

class GetpostController extends Controller
{
    public function recently()
    {
    	$limit = 10;
    	$dt = GetpostModel::RecentProduct($limit);
    	echo json_encode($dt);
    }
}
