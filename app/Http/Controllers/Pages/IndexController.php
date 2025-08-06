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

        return view('pages.index', compact('pharmacies', 'medicines', 'categories'));
    }

    public function addcart(){
        $id = $_GET['id'];

        return view("pages.cart");
    }

    public function pharmacyMedicine(Pharmacy $pharmacy)
    {
        $pharmacies = Pharmacy::all();
        $categories = Category::all();

        $medicines = Medicine::where('pharmacy_id', $pharmacy->id)->paginate(12);

        return view('pages.pharmacyMedicine', compact('pharmacies', 'medicines', 'categories'));
    }

    public function categoryMedicine(Category $category)
    {
        $pharmacies = Pharmacy::all();
        $categories = Category::all();

        $medicines = Medicine::where('category_id', $category->id)->paginate(12);

        return view('pages.categoryMedicine', compact('pharmacies', 'medicines', 'categories'));
    }

}
