<?php

namespace App\Livewire;

use App\Models\Cake;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class OrderForm extends Component
{
    public Cake $cake;
    public $customer_name;
    public $customer_address;
    public $quantity = 1;

    public function mount(Cake $cake)
    {
        $this->cake = $cake;
    }

    public function placeOrder()
    {
        $this->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:1000',
            'quantity' => 'required|integer|min:1',
        ]);

        $subtotal = $this->cake->price * $this->quantity;

        $order = Order::create([
            'customer_name' => $this->customer_name,
            'customer_address' => $this->customer_address,
            'total_price' => $subtotal,
            'status' => 'pending',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'cake_id' => $this->cake->id,
            'quantity' => $this->quantity,
            'subtotal' => $subtotal,
        ]);

        session()->flash('message', 'Pesanan berhasil dibuat!');

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
