<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\CrudActions;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    use CrudActions;

    protected string $model = Coupon::class;

    protected function rules($id = null)
    {
        return [
            'code' => ['required','string','max:100', Rule::unique('coupons','code')->ignore($id)],
            'discount_type' => ['required', Rule::in(['percent','fixed'])],
            'discount_value' => 'required|numeric',
            'expires_at' => 'nullable|date',
        ];
    }
}
