<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::with('parent')->paginate(15);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $parents = Category::pluck('name', 'id');
        return view('categories.create', compact('parents'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', __('Category created.'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $parents = Category::where('id', '!=', $category->id)->pluck('name', 'id');
        return view('categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate($this->rules($category->id));
        $category->update($data);

        return redirect()->route('categories.index')
            ->with('success', __('Category updated.'));
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('Category deleted.'));
    }

    /**
     * Validation rules for store and update actions.
     */
    protected function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($id)],
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
}
