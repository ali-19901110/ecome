<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $ProductsFromDB = Product::all();
        
        return view('pages.product.index', compact('ProductsFromDB'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        //dd($subcategories);
        return view('pages.product.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        //dd($request);

        Product::create([
            'name' => $request->name,
            'description' => $request->desc,
            'price' => $request->price,
            'stock' => $request->stock,
            'subcategory_id' => $request->subcate,
            'updated_at' => now(),

        ]);
        //dd($request->name, $request->desc,$request->price,$request->stock, $request->subcate);
        return redirect()->route('products.index');
    }

    public function edit()
    {
        
        return view('pages.product.edit');
    }
    public function update()
    {
        return "Update Page";
    }
    public function destroy()
    {
        return "destroy Page";
    }
}
