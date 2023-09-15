<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Item;

class HomeController extends Controller
{
    public function view()
    {
        $subcat = Subcategory::all();
        $items = Item::all();

        return view('home', ['subcat' => $subcat, 'items' => $items]);
    }
}
