<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'parent_category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|string|max:255|unique:subcategories,name',
        ]);
        Subcategory::create([
            'name' => $request->subcategory_name,
            'category_id' => $request->parent_category_id,
        ]);
        return redirect()->back()->with('success', 'Subcategory added successfully!');
    }
}
