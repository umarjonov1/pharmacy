<?php

namespace App\Http\Controllers\Pharmacy;

use App\Category;
use App\Medicine;
use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('pharmacy.medicine.index', compact('medicines'));
    }

    public function createMedicine()
    {
        $pharmacies = Pharmacy::all();
        $categories = Category::all();
        return view('pharmacy.medicine.create', compact('pharmacies', 'categories'));
    }

    public function storeMedicine(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'pharmacy_id' => 'integer|required',
            'category_id' => 'integer|required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $filename);
            $validated['image'] = $filename;
        }

        $medicine = new Medicine();
        $medicine->fill($validated);
        $medicine->save();

        return view('pharmacy.medicine.show', compact('medicine'));
    }

    public function editMedicine(Medicine $medicine)
    {
        $pharmacies = Pharmacy::all();
        $categories = Category::all();
        return view('pharmacy.medicine.edit', compact('medicine', 'pharmacies', 'categories'));
    }

    public function updateMedicine(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'pharmacy_id' => 'integer|required',
            'category_id' => 'integer|required',
        ]);

        if ($request->hasFile('image')) {
            // Удаление старого файла
            if (!empty($medicine->image)) {
                $oldPath = public_path('uploads/' . $medicine->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            // Сохранение нового файла
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $filename);

            // Обновление имени валидационных данных
            $validated['image'] = $filename;
        }

        $medicine->update($validated);

        return view('pharmacy.medicine.show', compact('medicine'));
    }



    public function showMedicine(Medicine $medicine)
    {

        return view('pharmacy.medicine.show', compact('medicine'));
    }

    public function deleteMedicine(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('pharmacy.medicine.index');
    }
}
