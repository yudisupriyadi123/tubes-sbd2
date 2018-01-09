<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;

class CategoryController extends Controller
{
    public function get()
    {
        $rest = CategoryModel::Get();
        echo json_encode($rest);
    }
    public function delete(Request $req)
    {
        $id = $req['id'];
        $rest = CategoryModel::CtrDelete($id);
        echo $rest;
    }
    public function addParent(Request $req)
    {
        $ctr = $req['ctr'];
        $data = array('id' => NULL, 'name' => $ctr, 'parent_category' => 0);
        $rest = CategoryModel::AddParent($data);
        if ($rest) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function addChild(Request $req)
    {
        $ctr = $req['ctr'];
        $prt = $req['prt'];
        $data = array('id' => NULL, 'name' => $ctr, 'parent_category' => $prt);
        $rest = CategoryModel::AddParent($data);
        if ($rest) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

