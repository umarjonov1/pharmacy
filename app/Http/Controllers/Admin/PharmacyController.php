<?php

namespace App\Http\Controllers\Admin;

use App\Pharmacy;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = \App\Pharmacy::all();

        return view('admin.pharmacy.index', compact('pharmacies'));
    }

    public function create()
    {
        $pharmacists = User::where('role', 2)->get();
        return view('admin.pharmacy.create', compact('pharmacists'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'owner' => 'required|string',
            'pharmacist' => 'required|numeric',
            'lat' => 'numeric',
            'lng' => 'numeric',
        ]);
        $pharmacy = new Pharmacy();
        $pharmacy->fill($validated);
        $pharmacy->save();

        return redirect()->route('admin.pharmacy.index');
    }

    public function show(\App\Pharmacy $pharmacy) {

        return view('admin.pharmacy.show', compact('pharmacy'));
    }

    public function edit(\App\Pharmacy $pharmacy)
    {

        $pharmacists = (User::where('role', 2)->get());
        return view('admin.pharmacy.edit', compact('pharmacy', 'pharmacists'));
    }

    public function update(Request $request, \App\Pharmacy $pharmacy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'owner' => 'required|string',
            'pharmacist' => 'nullable|numeric',
            'lat' => 'numeric',
            'lng' => 'numeric',
        ]);
        $pharmacy->update($validated);

        return view('admin.pharmacy.show', compact('pharmacy'));
    }

    public function delete(\App\Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return redirect()->route('admin.pharmacy.index');
    }
}
