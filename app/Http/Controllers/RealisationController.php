<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;

class RealisationController extends Controller{
    public function get($url){
        $gallery = Gallery::where('url', $url)->first();
        $photos = GalleryPhoto::where('gallery', $gallery->id)
            ->orderBy('orderimg', 'asc')
            ->get();
        
        $list=[];
        if($photos != null && $gallery != null){
            foreach ($photos as $photo) {
                array_push($list, [
                    "image" => $gallery->id.'/'.$gallery->url.'-'.$photo->image,
                    "title" => $photo->title,
                    "localization" => $photo->localization
                ]);
            }
        }
        
        $gal = [
            "id" => "annonce",
            "title" => (isset($gallery) && isset($gallery->title)) ? $gallery->title : '',
            "nbthumb" => 4,
            "modal" => true,
            "zoom" => "false",
            "list" => $list
        ];

        return view('pages/realisation')
            ->with('gallery', $gal)
            ->with('meta', null);
    }
}
