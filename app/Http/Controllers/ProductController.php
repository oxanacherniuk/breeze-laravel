<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request) {
        $id = $request->id;
        $product = DB::table('products') ->join('categories', 'categories.id', '=', 'products.product_type')->where('products.id', $id)->first();
        if(!is_null($product)) {
            $product->id = intval($id);
            return view('product', ['product' => $product]);
        } else {
            return abort(404);
        }

    }
}
