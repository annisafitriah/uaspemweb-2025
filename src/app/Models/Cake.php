<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
      use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image_path'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
