<?php

namespace App\Http\Controllers\Courier;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('courier_id', auth()->id())->get();
        $userId = auth()->id();
        $amountOrder = count($orders);
        return view('courier.order.index', compact('amountOrder', 'orders'));
    }

    public function show(Request $request, Order $order)
    {

        $amountOrder = Order::where('courier_id', auth()->id())->get();
        return view('courier.order.show', compact('order', 'amountOrder'));
    }

    public function updateDeliveryStatus(Request $request, Order $order)
    {
        try {
            $order->delivery = $request->input('delivery');
            $order->save();
            return response()->json(['message' => 'Delivery status updated'], 200);
        } catch (\Throwable $e) {
            // Логируем в laravel.log:
            \Log::error("Order#{$order->id} delivery update failed: ".$e->getMessage());
            return response()->json([
                'error' => 'Exception: '.$e->getMessage()
            ], 500);
        }
    }

    public function updateCourier(Request $request, Order $order)
    {
        $order->courier_id = $request->input('courier_id');
        $order->save();

        return response()->json(['message' => 'Courier updated'], 200);
    }




//    public function edit(Order $order)
//    {
//
//        return view('courier.order.edit', compact('order'));
//    }
//
//    public function update(Request $request, Order $order)
//    {
//        $data = [];
//        if ($request->filled('status')) {
//            $data['status'] = $request->status;
//        }
//        if ($request->filled('courier_id')) {
//            $data['courier_id'] = $request->courier_id;
//        }
//
//        $order->update($data);
//        return view('courier.order.show', compact('order'));
//    }


}
