<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleriesArr=Gallery::get();
        return view('gallery')->with(['galleriesArr'=>$galleriesArr]);
    }
    public function add_img(Request $request)
    {
        $gallery = new Gallery();
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $gallery->image=$imageName;
        if($gallery->save()){
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            return response()->json([
                'success' => true,
                'message' => 'Image Upload successful',
                'gallery'=>$gallery
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Image not uploaded'
        ]);
    }
}
