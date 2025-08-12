<?php

namespace App\Http\Controllers\Pages;

use App\Category;
use App\Medicine;
use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        $medicines = Medicine::paginate(16);
        $categories = Category::all();
//        $locations = Pharmacy::select('lat', 'lng')->get();

        return view('pages.index', compact('pharmacies', 'medicines', 'categories'));
    }

    public function addcart(){
        $id = $_GET['id'];

        return view("pages.cart");
    }


    public function pharmacyMedicine(Pharmacy $pharmacy)
    {

        $medicines = Medicine::where('pharmacy_id', $pharmacy->id)->paginate(12);

        return view('pages.pharmacyMedicine', compact('pharmacies', 'medicines', 'categories'));
    }

    public function categoryMedicine(Category $category)
    {

        $medicines = Medicine::where('category_id', $category->id)->paginate(12);

        return view('pages.categoryMedicine', compact('pharmacies', 'medicines', 'categories'));
    }

    public function productDetails(Medicine $medicine)
    {


        return view('pages.productDetail', compact('medicine', 'pharmacies', 'categories'));
    }

    // Pages/IndexController.php
    public function medicineSearch(Request $request)
    {
        $q = trim($request->get('title', ''));

        $query = Medicine::query();

        if ($q !== '') {
            $query->where('title', 'like', '%'.$q.'%');
        }

        $medicines = $query->select('id', 'title', 'price')->limit(20)->get();

        if ($request->ajax()) {
            return response()->json([
                'data'  => $medicines,
                'count' => $medicines->count(),
            ]);
        }

        return view('pages.searchMedicine', compact('medicines', 'q'));
    }


}
