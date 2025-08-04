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

        return view('admin.pharmacy.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'owner' => 'required|string',
        ]);
        $pharmacy = new Pharmacy();
        $pharmacy->fill($validated);
        $pharmacy->save();

        return redirect()->route('admin.medicine.index');
    }

    public function show(\App\Pharmacy $pharmacy) {

        return view('admin.pharmacy.show', compact('pharmacy'));
    }

    public function edit(\App\Pharmacy $pharmacy)
    {

        return view('admin.pharmacy.edit', compact('pharmacy'));
    }

    public function update(Request $request, \App\Pharmacy $pharmacy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'owner' => 'required|string',
        ]);
        $pharmacy->update($validated);

        return view('admin.pharmacy.show', compact('pharmacy'));
    }

    public function delete(\App\Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return redirect()->route('admin.medicine.index');
    }
}
