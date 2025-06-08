<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Concerns\CrudActions;

class OrderItemController extends Controller
{
    use CrudActions;

    protected string $model = OrderItem::class;

    protected function rules($id = null)
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric',
        ];
    }
}
