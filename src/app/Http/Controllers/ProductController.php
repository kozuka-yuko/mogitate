<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

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

    public function store(RegisterRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
        } else {
            $path = null;
        }
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $path,
            'description' => $request->input('description')
        ]);
        return redirect('product');
    }
}
