<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact(['categories']));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_category' => 'required',
            'description' => 'required',
        ]);

        Category::create([
            'name_category' => $request->name_category,
            'description' => $request->description,
        ]);

        return back()->with([
            'message' => 'Berhasil menambahkan category baru',
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with([
            'message' => 'Berhasil menghapus category',
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_category' => 'required',
            'description' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->name_category = $request->name_category;
        $category->description = $request->description;
        $category->save();

        return back()->with([
            'message' => 'Data category berhasil diupdate'
        ]);
    }
}
