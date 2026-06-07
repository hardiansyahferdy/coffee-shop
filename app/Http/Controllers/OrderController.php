<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'customer_name' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return back()->withErrors(['quantity' => 'Stok produk tidak mencukupi!'])->withInput();
        }

        $total_price = $product->price * $request->quantity;
        $product->decrement('stock', $request->quantity); // Potong stok otomatis

        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'customer_name' => $request->customer_name,
            'status' => 'pending'
        ]);

        return redirect()->route('orders.index')->with('success', 'Order sukses dibuat!');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,completed,cancelled']);

        // Jika dicancel, kembalikan stok barang semula
        if ($request->status == 'cancelled' && $order->status != 'cancelled') {
            if ($order->product) {
                $order->product->increment('stock', $order->quantity);
            }
        }

        $order->update(['status' => $request->status]);
        return redirect()->route('orders.index')->with('success', 'Status transaksi diperbarui!');
    }
}