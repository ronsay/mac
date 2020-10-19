<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;
use App\Models\Database\Photo;

class GalleryController extends Controller{
    public function addPhoto($request){
        $gallery = Gallery::find($request->gallery);
        if($gallery != null){
            return $this->savePhoto(new GalleryPhoto);
        }else{
            abort(404);
        }
    }
    
    public function upload(Request $request){
        $photo = new Photo();
        $photo->current = true;
        $photo->save();
        Input::file('image')->move('img/gallery/tmp',date('U').'.'.$request->image->extension());
        return $photo->id;
    }
    
    public function getStatus($id){
        $photo = Photo::find($id);
        if($photo != null && !$photo->current){
            $photo->delete();
            return true;
        }
        return false;
    }
    
    private function savePhoto($galleryPhoto, $request){
        $galleryPhoto->gallery = $request->gallery;
        $galleryPhoto->image = $request->image;
        $galleryPhoto->title = $request->title;
        $galleryPhoto->localization = $request->localization;
        $galleryPhoto->orderimg = $request->orderimg;
        $galleryPhoto->save();
        return $galleryPhoto->id;
    }
}
