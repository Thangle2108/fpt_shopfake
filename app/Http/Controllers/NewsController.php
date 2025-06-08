<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Concerns\CrudActions;

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
