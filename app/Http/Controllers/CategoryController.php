<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //Get all categories from DB
        $allCategoriesFromDB = Category::all();
        return view('pages.category.index', compact('allCategoriesFromDB'));
    }
    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        //validation Form
        $request->validate([
            'name_cate' => ['required', 'min:3'],
        ]);
        //Insert to DB
        Category::create([
            'name' => $request->name_cate
        ]);
        return redirect()->route('categories.index')->with('success', 'You have inserted the category successfully.');
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // validation
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        $category->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

        return redirect()->route('categories.index');
    }

   public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
