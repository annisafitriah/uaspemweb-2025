<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::latest()->get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cake_id' => 'required|exists:cakes,id',
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cake = Cake::find($request->cake_id);
        $totalPrice = $cake->price * $request->quantity;

        $order = Order::create([
            'cake_id' => $cake->id,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return response()->json([
            'message' => 'Pesanan berhasil dibuat.',
            'order' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }
}
