<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;

class AdminController extends Controller{
    public function getIndex(){
        return view('admin/index')
            ->with('user',Auth::user())
            ->with('galleries', $this->listGalleries());
    }
    
    public function getGallery($id){
        $gallery = Gallery::find($id);
        $photos = GalleryPhoto::where('gallery', $gallery->id)
            ->orderBy('orderimg', 'asc')
            ->get();
        
        return view('admin/gallery')
            ->with('user',Auth::user())
            ->with('gallery', $gallery)
            ->with('photos', $photos)
            ->with('galleries', $this->listGalleries());
    }
    
    private function listGalleries(){
        return Gallery::all();
    }
}
