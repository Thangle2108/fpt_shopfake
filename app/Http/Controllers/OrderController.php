<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\CrudActions;

class OrderController extends Controller
{
    use CrudActions;

    protected string $model = Order::class;

    protected function rules($id = null)
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|string|max:50',
            'total' => 'required|numeric',
            'payment_method' => 'required|string|max:50',
        ];
    }
}
