<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    use CrudActions;

    protected string $model = News::class;

    protected function rules($id = null)
    {
        return [
            'title' => 'required|string',
            'slug' => ['required','string', Rule::unique('news','slug')->ignore($id)],
            'cover_img' => 'nullable|string',
            'content' => 'required|string',
            'author_id' => 'nullable|exists:users,id',
        ];
    }
}
