<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() : View
    {
        $orders = Order::where('user_id', auth()->id())->paginate(5);
        return view('order.index',[
            'orders' => $orders,
            'title' => 'Order List'
        ]);
    }
    public function create() : View
    {
        $products = Product::all();
        return view('order.create',[
            'title' => 'Create Order',
            'products' => $products
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'invoice' => 'required',
        ]);
        $newOrder = Order::create([
            'invoice' => $request->invoice,
            'quantity' => $request->quantity,
            'status' => 'unpaid',
            'user_id' => auth()->id()
        ]);

        $newOrder->products()->attach($request->product_id);

        return redirect()->route('order.index');
    }
    public function show(Order $order) : View
    {
        return view('order.show',[
            'order' => $order,
            'title' => 'Order Details'
        ]);
    }

    public function edit(Order $order) : View
    {
        return view('order.edit', [
            'order' => $order,
            'title' => 'Edit Order'
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'invoice' => 'required'
        ]);
        $order->update($request->all());
        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }


}
