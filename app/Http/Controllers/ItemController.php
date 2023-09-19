<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function view(Request $request)
    {
        $items = Item::with('subcategory.category')->get();
        $category = DB::table('category')
            ->select('category_id', 'name')
            ->get();
        $subcat = DB::table('subcategory')
            ->select('subcategory_id', 'category_id', 'name')
            ->get();

        return view('admin.item', ['items' => $items,'category' => $category, 'subcat' => $subcat]);
    }
    public function add_item(Request $request)
    {
        $imagePath = $request->file('image')->move('public');
        $cat_id = Subcategory::find($request['subcategory_id'])->category_id;
        $item = DB::table('items');
            $item = new Item;
            $item->name = $request['name'];
            $item->description = $request['description'];
            $item->price = $request['price'];
            $item->category_id = $cat_id;
            $item->subcategory_id = $request['subcategory_id'];
            $item->image_src = $imagePath;
            $item->save();

        return redirect()->route('admin.item');
    }
    public function delete_item($item_id)
    {
        $item = DB::table('items')
            ->where('item_id', $item_id)
            ->delete();

        return redirect()->route('admin.item');
    }
    public function view_item($item_id)
    {
        $item = DB::table('items')
            ->where('item_id', $item_id)
            ->first();
        $subcat = DB::table('subcategory')
            ->select('subcategory_id', 'category_id', 'name')
            ->get();

        return view('admin.edititem', ['item' => $item, 'subcat' => $subcat]);
    }
    public function update_item(Request $request, $item_id)
    {
        if ($request->hasFile('image')) 
        {
            $newImage = $request->file('image')->move('public');
            $item = Item::find($item_id);
            $item->image_src = $newImage;
            $item->save();
        }
        $item = DB::table('items')
            ->where('item_id', $item_id)
            ->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'subcategory_id' => $request['subcategory_id'],
            ]);
            
        return redirect()->route('admin.item');
    }
}
