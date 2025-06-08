<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    use CrudActions;

    protected string $model = Brand::class;

    protected function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => ['required','string','max:255', Rule::unique('brands','slug')->ignore($id)],
            'logo' => 'nullable|string',
        ];
    }
}
