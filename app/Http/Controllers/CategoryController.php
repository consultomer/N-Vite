<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function view(Request $request)
    {
        $category = DB::table('category')
            ->select('category_id', 'name')
            ->get();

        return view('admin.category', ['category' => $category]);
    }
    public function add_cat(Request $request)
    {
            $category = DB::table('category');
            $category = new Category;
            $category->name = $request['name'];
            $category->save();

            return redirect()->route('admin.category');
    }
    public function delete_cat($id)
    {
        $category = DB::table('category')
            ->where('category_id', $id)
            ->delete();

        return redirect()->route('admin.category');
    }
}
