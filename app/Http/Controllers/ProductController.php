<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Concerns\CrudActions;

class ProductController extends Controller
{
    use CrudActions;

    protected string $model = Product::class;

    protected function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => ['required','string','max:255', Rule::unique('products','slug')->ignore($id)],
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
            'short_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'is_active' => 'boolean',
        ];
    }
}
