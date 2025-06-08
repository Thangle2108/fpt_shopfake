<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Concerns\CrudActions;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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
