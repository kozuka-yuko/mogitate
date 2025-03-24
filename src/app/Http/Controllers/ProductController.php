<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function search(Request $request)
    {
        $price_order = $request->price;
        $products = Product::NameSearch($request->name_input)->when($price_order, function ($query) use ($price_order) {
            return $query->orderBy('price', $price_order == 'asc' ? 'asc' : 'desc');
        })->get();
        if ($products->isEmpty()) {
            session()->flash('result', '該当する店舗がありませんでした');
            return view('product', compact('products'));
        } else {
            return view('product', compact('products'));
        }
    }

    public function register()
    {
        return view('register');
    }
}
