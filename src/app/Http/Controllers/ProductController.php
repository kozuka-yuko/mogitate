<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->paginate(6);
        return view('product', compact('products'));
    }

    public function search(Request $request)
    {
        $price_order = $request->sortByPrice;
        $products = Product::NameSearch($request->name_input)->when($price_order, function ($query) use ($price_order) {
            return $query->orderBy('price', $price_order == 'asc' ? 'asc' : 'desc');
        })->get()->paginate(6);
        if ($products->isEmpty()) {
            session()->flash('result', '該当する店舗がありませんでした');
            return view('product', compact('products'));
        } else {
            return view('product', compact('products'));
        }
    }

    public function register()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = null;
        }
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $path ? 'storage/' . $path : null,
            'description' => $request->input('description')
        ]);

        if ($request->has('seasons')) {
            $product->seasons()->attach($request->input('seasons'));
        }
        return redirect()->route('index')->session()->flash('result', '商品を登録しました');
    }
    
    public function detail($id)
    {
        $seasons = Season::all();
        $product = Product::with('seasons')->findOrFail($id);
        return view('detail', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = null;
        }
        $product = Product::with('seasons')->findOrFail($id);

        if (!$product) {
            return redirect()->route('index')->with('error', '商品が見つかりませんでした');
        }

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $path ? 'storage/' . $path : $product->image,
            'description' => $request->input('description')
        ]);

        if ($request->has('seasons')) {
            $product->seasons()->sync($request->input('seasons', []));
        }
        return redirect()->route('index')->with('result', '登録内容を変更しました');
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('index')->with('result', '{{ $request->name }}を削除しました');
    }
}