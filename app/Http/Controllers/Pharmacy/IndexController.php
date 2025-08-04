<?php

namespace App\Http\Controllers\Pharmacy;

use App\Medicine;
use App\Pharmacy;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('pharmacy.index');
    }

    public function pharmacy()
    {
        $pharmacies = Pharmacy::all();

        return view('pharmacy.indexPharmacy', compact('pharmacies'));
    }

    public function medicinePharmacy(Pharmacy $pharmacy)
    {
        $medicines = Medicine::where('pharmacy_id', $pharmacy->id)->get();

        return view('pharmacy.medicinePharmacy', compact('medicines'));
    }

}
