<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class BlogCategoryController extends Controller
{
    function index(){
        
        return view("category")->with("title","Blog Category");
    }
    function store(Request $request){

        $request->validate([
            'category' => 'required|unique:category|max:255',
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully.');

   }

   function show(){
    $categories = Category::all();
    return response()->json(['data' => $categories]);
   }
}
