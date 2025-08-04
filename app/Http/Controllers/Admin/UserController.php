<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact("users"));
    }

    public function create() {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // ← вот эта строка
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create($validated);

        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
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

        return view('admin.user.show', compact('user'));
    }

    public function show(User $user) {

        return view('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}
