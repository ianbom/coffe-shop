<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function total()
    {
        $totalUser = User::getTotalUser();
        $totalProducts = Product::getTotalProducts();
        $totalOrder = Order::getTotalOrder();

        $totalCoffe = Product::where('category', '1')->count();
        $totalNon = Product::where('category', '0')->count();

        // Inisialisasi variabel
        $productName = null;
        $totalPurchased = 0;

        $mostPurchasedProduct = Transaction::select('product_id', DB::raw('SUM(amount) as total'))
            ->groupBy('product_id')
            ->orderByDesc('total')
            ->first();

        if ($mostPurchasedProduct) {
            $product = Product::find($mostPurchasedProduct->product_id);

            if ($product) {
                $productName = $product->name;
                $totalPurchased = $mostPurchasedProduct->total;
            }
        }

        $products = Product::all();

        $totalSalesPerProduct = [];

        // Menghitung total penjualan untuk setiap produk
        foreach ($products as $product) {
            $totalSales = $product->transactions()->sum('amount');
            $totalSalesPerProduct[$product->name] = $totalSales;
        }

        $products = Product::withSum('transactions', 'amount')->get();

        // Mengumpulkan data nama produk dan total penjualan untuk digunakan di grafik
        $namaProduk = $products->pluck('name');
        $totalSold = $products->pluck('transactions_sum_amount');

        $usersWithOrderCount = Order::select('user_id', DB::raw('COUNT(*) as order_count'))
            ->groupBy('user_id')
            ->get();

        $userNames = [];
        $orderCounts = [];

        foreach ($usersWithOrderCount as $userOrder) {
            $user = User::find($userOrder->user_id);
            if ($user) {
                $userName = $user->name;
                $orderCount = $userOrder->order_count;

                $userNames[] = $userName;
                $orderCounts[] = $orderCount;
            }
        }

        $coffeeSold = Product::where('category', 1)
            ->whereHas('transactions')
            ->with(['transactions' => function ($query) {
                $query->whereHas('order');
            }])
            ->get()
            ->reduce(function ($total, $product) {
                return $total + $product->transactions->sum('amount');
            }, 0);

        $nonCoffeeSold = Product::where('category', 0)
            ->whereHas('transactions')
            ->with(['transactions' => function ($query) {
                $query->whereHas('order');
            }])
            ->get()
            ->reduce(function ($total, $product) {
                return $total + $product->transactions->sum('amount');
            }, 0);

        $paidOrders = Order::where('is_paid', true)->get();

        // Menghitung total pendapatan dari semua pengguna
        $totalEarning = $nonCoffeeSold + $coffeeSold;

        return view('dashboard_admin', compact(
            'totalUser', 'totalProducts', 'totalOrder', 'totalCoffe', 'totalNon',
            'productName', 'totalPurchased', 'totalSalesPerProduct', 'totalSales',
            'namaProduk', 'totalSold', 'userNames', 'orderCounts', 'coffeeSold',
            'nonCoffeeSold', 'totalEarning'
        ));
    }
}
