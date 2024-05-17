<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class OrderJadiController extends Controller
{
    public function checkout_jadi()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if($carts == null)
        {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            $cart->delete();
        }

        return redirect()->route('views2.order_detail',['order'=>$order])->with('succes', 'Checkout Bisa');

    }

    public function index_order_jadi()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if($is_admin)
        {
            $orders = Order::all();
        }
        else
        {
            $orders = Order::where('user_id', $user->id)->get();
        }

        $userId = Auth::user();
        $totalPrices = Order::where('user_id', $userId)
        ->join('transactions', 'orders.id', '=', 'transactions.order_id')
        ->join('products', 'transactions.product_id', '=', 'products.id')
        ->select(DB::raw('SUM(products.price * transactions.amount) as total_price'))
        ->groupBy('orders.id')
        ->get();

        return view('views2.order', compact('orders', 'totalPrices'));
    }

    public function show_order_jadi(Order $order)
    {
        $user = Auth::user();

        $is_admin = $user->is_admin;

        if ($is_admin || $order->user_id == $user->id)
        {
            return view('views2.order_detail', compact('order'));
        }
        
         return Redirect::route('views2.order');
    }

    public function submit_payment_receipt_jadi(Order $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back();
    }

    public function confirm_payment_jadi(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);

        return Redirect::back();
    }
}
