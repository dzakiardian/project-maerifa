<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(CategoryRequest $request)
    {
        $request->validated();
        Category::create(["category_name" => $request->category_name]);

        return back()->with("success-message", "Category success created!");
    }
}
