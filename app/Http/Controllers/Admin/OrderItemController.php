<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('admin.order_items.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        OrderItem::create($data);

        return redirect()->route('admin.order-items.index')
            ->with('success', 'Order item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        return view('admin.order_items.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        return view('admin.order_items.edit', compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $data = $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        $orderItem->update($data);

        return redirect()->route('admin.order-items.index')
            ->with('success', 'Order item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('admin.order-items.index')
            ->with('success', 'Order item deleted successfully.');
    }
}
