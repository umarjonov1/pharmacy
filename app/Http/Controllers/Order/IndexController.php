<?php

namespace App\Http\Controllers\Order;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function add()
    {
        $userId = \Auth::id();
        $carts = session()->get("cart.$userId", []);

        foreach ($carts as $id => $medicine) {
            $order = new Order();
            $data = [
                'user_id' => $userId,
                'price' => $medicine['price'],
                'quantity' => $medicine['quantity'],
                'product_id' => $id,
                'total_coast' => $medicine['price'] * $medicine['quantity']
            ];
            $order->fill($data);
            $order->save();
        }

        session()->forget("cart.$userId");

        return redirect()->route('page.index');
    }
}
