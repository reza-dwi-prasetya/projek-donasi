<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LearnMoreController extends Controller
{
    public function index()
    {
        return view('pages.learn-more');
    }
}
