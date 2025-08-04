<?php

namespace App\Http\Controllers\Cart;

use App\Medicine;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function add(Medicine $medicine)
    {
        $userId = Auth::id();

        $cart = session()->get("cart.$userId", []);

        if (isset($cart[$medicine->id])) {
            $cart[$medicine->id]['quantity']++;
        } else {
            $cart[$medicine->id] = [
                'id' => $medicine->id,
                'title' => $medicine->title,
                'price' => $medicine->price,
                'quantity' => 1,
                'description' => $medicine->description,
            ];
        }

        session()->put("cart.$userId", $cart);

        return redirect()->back()->with('success', 'Product added in to the basket');
    }

    public function index()
    {
        $userId = Auth::id();
        $cart = session()->get("cart.$userId", []);
        return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $userId = Auth::id();
        $cart = session()->get("cart.$userId", []);

        unset($cart[$id]);
        session()->put("cart.$userId", $cart);

        return redirect()->back()->with('success', 'Product was deleted from basket');

    }

    public function plusProduct($id)
    {
        $userId = Auth::id();
        $cart = session()->get("cart.$userId", []);
        $cart[$id]['quantity']++;

        session()->put("cart.$userId", $cart);

        return redirect()->back()->with('success', 'Product was deleted from basket');
    }

    public function subProduct($id)
    {
        $userId = Auth::id();
        $cart = session()->get("cart.$userId", []);
        if ($cart[$id]['quantity'] <= 1) {
            unset($cart[$id]); // или вызвать метод удаления, если он обновляет сессию
        } else {
            $cart[$id]['quantity']--;
        }

        session()->put("cart.$userId", $cart);

        return redirect()->back()->with('success', 'Product quantity updated');
    }

}
