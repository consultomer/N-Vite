<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //
    public function view(Request $request)
    {
        $subcate = Subcategory::with('category')->get();
        $category = DB::table('category')
            ->select('category_id', 'name')
            ->get();
        return view('admin.subcategory', ['subcate' => $subcate,'category' => $category]);
    }
    public function add_subcat(Request $request)
    {
        $subcate = DB::table('subcategory');
            $subcate = new SubCategory;
            $subcate->name = $request['name'];
            $subcate->category_id = $request['category_id'];
            $subcate->save();

            return redirect()->route('admin.subcategory');
    }
    public function delete_subcat($id)
    {
        $subcate = DB::table('subcategory')
        ->where('subcategory_id', $id)
        ->delete();

        return redirect()->route('admin.subcategory');
    }
}
