<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;


class DisplayController extends Controller
{
    public function view($id)
    {
        $subcat = Subcategory::with('category')->where('category_id', $id)->get();
        $item = Item::with('category')->where('category_id', $id)->get();

        return view('category', ['subcat' => $subcat, 'items' => $item]);
    }
    public function card($id)
    {
        $item = Item::find($id);

        return view('card', ['item' => $item]);
    }
    public function capture(Request $request)
    {
        $imageData = $request['imi'];
        $imagePath = '/images';
        $imageName = uniqid() . '.png';
        Storage::disk('public')->put($imagePath . '/' . $imageName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));
        $imagepath = "images/" . $imageName;
        $image = Storage::url($imagepath);
            
        return view('/cards', ['data' => $image]);
    }
}
