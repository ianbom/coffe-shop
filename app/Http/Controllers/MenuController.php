<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        $product = Product::all();

        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        $search = $request->input('search');
        $category = $request->input('category'); // Ambil kategori dari input

        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($category === '1' || $category === '0') {
            $query->where('category', $category); // Gunakan variabel kategori dalam query
        }

        if ($category === null) {
            $products = Product::all();
        }

        $cari = $query->get();


        return view('views2.menu', compact('product', 'carts', 'cari'));
    }


    public function add_to_cart_menu(Product $product, Request $request)
    {
        $user_id = Auth::id();

        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if($existing_cart == null)
        {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock
            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        }
        else
        {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount)
            ]);

            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }

        return Redirect::back();
    }

    public function show_cart_menu()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('views2.menu', compact('carts'));
    }

    public function update_cart_menu(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('views2.menu');
    }

    public function delete_cart_menu(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }

}
