<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::all();

        return response()->json([
            'success' => true,
            'data' => $cakes,
        ]);
    }
}
