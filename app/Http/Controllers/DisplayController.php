<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
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
        $imageData = $request['imi']; // Assuming 'image_data' is the data URL of the image
    
        // Save the image to a predefined directory
            $imagePath = '/images'; // Change this to your desired directory
            $imageName = uniqid() . '.png'; // Generate a unique filename or use a different naming strategy
        
        // Save the image to storage
            Storage::disk('public')->put($imagePath . '/' . $imageName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));
            // dd($img_sr);
            // Store the image path in your database
            // You can use Eloquent or another database method here
            $imagepath = "images/" . $imageName;
            $image = Storage::url($imagepath);
            
        return view('/cards', ['data' => $image]);

    }
}
