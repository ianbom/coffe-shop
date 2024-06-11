<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function create_product()
    {
        return view('create_product');
    }

    public function create_product_admin()
    {
        return Redirect::route('product_create');
    }

    public function store_product_admin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required|boolean'
        ]);

        //$file = $request->file('image')->store('public/images/product');

        //$path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        //Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $file = $request->file('image');
        // $path = "https://ngopiyukk-bucket-s3.s3.ap-southeast-1.amazonaws.com/".$file;
        $path = $file->store('public/image/product', [
            'disk'=> 's3',
            'visibility'=>'public'
        ]);
        $url = Storage::disk('s3')->url($path);
        //$path = Storage::putFile('image', $file);
        Storage::setVisibility($path, 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $url,
            'category' => $request->category
        ]);

        Session::flash('success', 'Product added successfully');
        dd($path);
        return response()->json([
            'image'=> $path
        ]);
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required|boolean'
        ]);

        $file = $request->file('image')->store('public/images/product');
        $path = "https://ngopiyukk-bucket-s3.s3.ap-southeast-1.amazonaws.com/".$file;


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
            'category' => $request->category
        ]);

        return Redirect::route('index_product');
    }

    public function index_product(Request $request)
    {
        $product = Product::all();

        return view('index_product', compact('product'));
    }

    public function index_product_admin(Request $request)
    {
        $product = Product::all();

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

        return view('product_admin', compact('product', 'cari'));
    }

    public function menu(Request $request)
    {
        $product = Product::all();
        return view('views2.menu', compact('product'));
    }

    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function edit_product_admin(Product $product)
    {
        return view('product_edit', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required'

        ]);

        $file = $request->file('image')->store('public/images/product');
        $path = "https://ngopiyukk-bucket-s3.s3.ap-southeast-1.amazonaws.com/".$file;


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
            'category' => $request->category
        ]);

        return Redirect::route('show_product', $product);
    }

    public function update_product_admin(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);

        $file = $request->file('image')->store('public/images/product');
        $path = "https://ngopiyukk-bucket-s3.s3.ap-southeast-1.amazonaws.com/".$file;


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
            'category' => $request->category
        ]);

        return Redirect::back();
    }

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }

    public function delete_product_admin(Product $product)
    {
        $product->delete();
        return Redirect::back();
    }

    public function search(Request $request)
        {
    $keyword = $request->input('keyword');
    $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->get();

    return view('search_results', compact('products', 'keyword'));
    }

    public function showByCategory($category)
    {
        return view('category_search', compact('products'));
    }

    public function show_cart_menu()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('views2.menu', compact('carts'));
    }

    public function product_total()
    {
        // Mengambil total produk menggunakan model Product
        $totalProducts = Product::getTotalProducts();

        // Mengirimkan data total produk ke tampilan
        return view('dashboard_admin', compact('totalProducts'));
    }

    public function searching(Request $request)
    {
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



        return view('product_admin', compact('cari'));
    }
}
