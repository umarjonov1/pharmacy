<?php

namespace App\Http\Controllers\Courier;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $amountOrder = count(Order::where('courier_id', auth()->id())->get());
        return view('courier.index', compact('amountOrder'));
    }

    public function profile()
    {
        $user = User::find(\Auth::id());
        $amountOrder = count(Order::where('courier_id', auth()->id())->get());

        return view('courier.profile', compact('user', 'amountOrder'));
    }

    public function editProfile(User $user)
    {
        $amountOrder = count(Order::where('courier_id', auth()->id())->get());
        return view('courier.edit', compact('user', 'amountOrder'));
    }

    public function updateProfile(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            // Удаление старого файла
            if (!empty($user->image)) {
                $oldPath = public_path('uploads/' . $user->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            // Сохранение нового файла
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $filename);

            // Обновление имени валидационных данных
            $validated['image'] = $filename;
        }
        $user->update($validated);

        return redirect()->route('courier.profile');
    }
}
