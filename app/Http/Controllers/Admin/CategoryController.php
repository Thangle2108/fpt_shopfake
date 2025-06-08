<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    use CrudActions;

    protected string $model = Category::class;

    protected function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => ['required','string','max:255', Rule::unique('categories','slug')->ignore($id)],
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
}
