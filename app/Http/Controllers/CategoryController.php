<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(CategoryRequest $request): RedirectResponse
    {
        $request->validated();
        Category::create(["category_name" => $request->category_name]);

        return back()->with("success-message", "Category success created!");
    }

    public function deleteCategory(string $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->destroy($id);

        return back()->with("success-message", "Category success deleted!");
    }
}
