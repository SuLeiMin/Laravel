<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        //$users = Keiyakukigyou::all();
        //return view('keiyakuichiran', ["items" => $users]);
        return view('example');
    }
}