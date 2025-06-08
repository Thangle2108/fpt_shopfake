<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Concerns\CrudActions;

class PageController extends Controller
{
    use CrudActions;

    protected string $model = Page::class;

    protected function rules($id = null)
    {
        return [
            'slug' => ['required','string', Rule::unique('pages','slug')->ignore($id)],
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }
}
