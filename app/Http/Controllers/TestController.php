<?php

namespace App\Http\Controllers;

use App\Sort;
use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $sorts = Sort::all();
        $products =Product::all();
        return view('test',compact('sorts','products'));
    }
}
