<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{
    use CrudActions;

    protected string $model = Banner::class;

    protected function rules($id = null)
    {
        return [
            'title' => 'nullable|string',
            'image' => 'required|string',
            'link' => 'nullable|url',
            'position' => 'nullable|string|max:50',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
        ];
    }
}
