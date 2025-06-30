<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fcades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index(Request $request) {
        $cartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
        $goodCart=[];
        $total = 0;
        foreach ($cartTable as $cartItem) {
            $product = DB::table('products')->select('title', 'price', 'qty')->where('id', $cartItem->pid)->first();
            $total += $cartItem->qty * $product->price;
            array_push(
                $goodCart,
                (object) [
                    'id' => $cartItem->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'qty' => $cartItem->qty,
                    'limit' => $product->qty
                ]
            );
        }
        return view('createOrder', ['cart' => $goodCart, 'total' => $total]);
    }

    public function createOrder(Request $request) {
        if(Hash::check($request->get('password'), $request->user()->password)) {
            $orderTable = DB::table('orders');
            $userCartTable = DB::table('cart')->where('uid', $request->user()->id)->get();
            foreach($userCartTable as $cartItem) {
                $orderTable->insert(['uid' => $cartItem->uid, 'pid' => $cartItem->pid, 'qty' => $cartItem->qty]);
            }
            DB::table('cart')->where('uid', $request->user()->id)->delete();
            return response()->json(['message' => 'good']);
        } else {
            return response()->json(['message' => 'err']);
        }
    }
}
