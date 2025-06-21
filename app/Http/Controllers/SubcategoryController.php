<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
       $allSubcategoriesFromDB = Subcategory::all();
        //dd(Subcategory::all());
        return view('pages.subcategory.index', compact('allSubcategoriesFromDB'));
    }
    
    public function create(){

        //Get all categories from DB
        $categories = Category::all();
        return view('pages.subcategory.create', compact('categories'));
    }

    public function store(Request $request){
        //dd($request->name);

        Subcategory::create([
            'name' =>$request->name,
            'category_id' => $request->cate,
        ]);
        return redirect()->route('subcategories.index');
    }

    public function edit(Subcategory $subcategory){

        //Get all categories from DB
        $categories = Category::all();
        return view('pages.subcategory.edit', compact('subcategory','categories'));
    }

    public function update(Request $request, Subcategory $subcategory){

          $request->validate([
            'name' => ['required', 'min:3'],
            'cate' =>['required']
        ]);

        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->cate,
            'updated_at' => now(),
        ]);

        return redirect()->route('subcategories.index');

    }
    public function destroy(Subcategory $subcategory){

        $subcategory->delete();

        return redirect()->route('subcategories.index');
    }
}
