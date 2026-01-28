<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriesController extends Controller
{
    public function index()
    {
        $histories = Order::with(['user', 'event', 'payment'])->latest()->get();
        return view('components.admin.history.index', compact('histories'));
    }

    public function show(string $history)
    {
        $order = Order::with(['user', 'event', 'payment', 'detailOrders.tiket'])->findOrFail($history);
        return view('components.admin.history.show', compact('order'));
    }
}
