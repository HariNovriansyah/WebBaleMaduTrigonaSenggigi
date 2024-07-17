<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::with('author')->get();
        return view('user.home', compact('blogs'));
    }

    public function guest(){
        $blogs = Blog::with('author')->get();
        return view('welcome', compact('blogs'));
    }

    public function adminDashboard()
    {
        // Total users
        $totalUsers = User::count();

        // Total new users in the last month
        $totalNewUsers = User::where('created_at', '>=', Carbon::now()->subMonth())->count();

        // Total orders
        $totalOrders = Order::count();

        // Total revenue
        $totalRevenue = Order::sum('total_price');

        // Orders that are not yet delivered
        $pendingOrders = Order::where('status', '!=', 'received')->get();

        return view('admin.dashboard', compact('totalUsers', 'totalNewUsers', 'totalOrders', 'totalRevenue', 'pendingOrders'));
    }
}
