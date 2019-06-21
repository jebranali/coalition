<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
//        foreach (get_existing_products(true) as $product){
//            dd(Carbon::parse($product->created_at));
//        }
        return view('welcome');
    }

    public function product(Request $request)
    {
        $products = add_products($request);
        return View::make('_partials.products_table', compact('products'));
    }

    public function products()
    {
        $products = get_existing_products(true);
        return View::make('_partials.products_table', compact('products'));
    }
}
