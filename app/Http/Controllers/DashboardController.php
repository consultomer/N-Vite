<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        $order = Order::count();
        $item = Item::count();
        $subcat = SubCategory::count();
        $cat = Category::count();
        $admin = Admin::count();

        return view('admin.dashboard', ['subcate' => $subcat,'category' => $cat,'item' => $item,'order' => $order,'admin' => $admin]);
    }
}
