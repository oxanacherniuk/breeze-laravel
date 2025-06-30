<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getProducts() {
        $products = DB::table('products')->get();
        $categories = DB::table('categories')->get();
        return view('catalog', ['products' => $products, 'categories'=> $categories]);
        $params = collect($request->query());

        if ($params->get('sort_by')) {
            $products = $products->sortBy($params->get('sort_by'));
        }

        if ($params->get('sort_by_desc')) {
            $products = $products->sortByDesc($params->get('sort_by_desc'));
        }

        if ($params->get('filter')) {
            $products = $products->where('product_type', $params->get('filter'));
        }
        return view('catalog', ['products' => $products, 'categories' => $categories, 'params' => $params]);
    }
}
