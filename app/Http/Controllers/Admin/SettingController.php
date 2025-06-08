<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    use CrudActions;

    protected string $model = Setting::class;

    protected function rules($id = null)
    {
        return [
            'key' => ['required','string','max:100', Rule::unique('settings','key')->ignore($id)],
            'value' => 'required|string',
        ];
    }
}
