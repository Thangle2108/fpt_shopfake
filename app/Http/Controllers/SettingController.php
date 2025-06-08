<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Concerns\CrudActions;

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
