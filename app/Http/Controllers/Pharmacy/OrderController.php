<?php

namespace App\Http\Controllers\Pharmacy;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('pharmacy.order.index', compact('orders'));
    }

    public function show(Request $request, Order $order)
    {
        if ($request->method('POST')) {
            $data = [];
            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }
            if ($request->filled('courier_id')) {
                $data['courier_id'] = $request->courier_id;
            }

            $order->update($data);
        }

        return view('pharmacy.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        try {
            $order->status = $request->input('status');
            $order->save();
            return response()->json(['message' => 'Status updated'], 200);
        } catch (\Throwable $e) {
            // Логируем в laravel.log:
            \Log::error("Order#{$order->id} status update failed: ".$e->getMessage());
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
//        return view('pharmacy.order.edit', compact('order'));
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
//        return view('pharmacy.order.show', compact('order'));
//    }


}
