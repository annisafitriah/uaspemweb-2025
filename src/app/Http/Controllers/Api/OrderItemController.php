<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Cake;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    public function index()
    {
        return response()->json(OrderItem::with(['order', 'cake'])->latest()->get());
    }

    public function show($id)
    {
        $item = OrderItem::with(['order', 'cake'])->find($id);

        if (!$item) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'cake_id' => 'required|exists:cakes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cake = Cake::findOrFail($request->cake_id);
        $subtotal = $cake->price * $request->quantity;

        $item = OrderItem::create([
            'order_id' => $request->order_id,
            'cake_id' => $request->cake_id,
            'quantity' => $request->quantity,
            'subtotal' => $subtotal,
        ]);

        return response()->json([
            'message' => 'Item pesanan berhasil ditambahkan.',
            'data' => $item->load(['order', 'cake']),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $item = OrderItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cake = $item->cake;
        $item->quantity = $request->quantity;
        $item->subtotal = $cake->price * $request->quantity;
        $item->save();

        return response()->json([
            'message' => 'Item pesanan berhasil diperbarui.',
            'data' => $item->load(['order', 'cake']),
        ]);
    }

    public function destroy($id)
    {
        $item = OrderItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Item pesanan berhasil dihapus.']);
    }
}
