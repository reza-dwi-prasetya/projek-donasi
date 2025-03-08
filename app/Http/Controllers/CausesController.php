<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CausesController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->get();

        return view('pages.causes',[
            'products'    => $products
        ]);
    }
    public function show($id)
    {
        $products = Product::find($id); // Gunakan find() untuk menghindari error jika data tidak ditemukan

        if (!$products) {
            abort(404); // Atau redirect ke halaman error
        }

        return view('causes.show', compact('products'));
    }
}
