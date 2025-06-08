<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use CrudActions;

    protected string $model = User::class;

    protected function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($id)],
            'password' => $id ? 'sometimes|nullable|string|min:6' : 'required|string|min:6',
        ];
    }
}
