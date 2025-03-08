<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class C_Learn1 extends Controller
{
    public function index()
    {
        return view('pages.learn1');
    }
}
