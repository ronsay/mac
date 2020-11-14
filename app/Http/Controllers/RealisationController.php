<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;
use App\Models\Meta;

class RealisationController extends Controller{
    public function get($url){
        $gallery = Gallery::where('url', $url)->first();
        $photos = GalleryPhoto::where('gallery', $gallery->id)
            ->where('status', 1)
            ->orderBy('orderimg', 'asc')
            ->get();
        
        $title = (isset($gallery) && isset($gallery->title)) ? $gallery->title : '';
        
        $list=[];
        $metaImg=[];
        if($photos != null && $gallery != null){
            foreach ($photos as $photo) {
                array_push($list, [
                    "image" => $photo->image,
                    "title" => $photo->title,
                    "localization" => $photo->localization
                ]);
                array_push($metaImg, array(
                    'image' => 'img/gallery/'.$gallery->url.'/fit/'.$photo->image,
                    'title' => $title
                ));
            }
        }
        
        $gal = [
            "id" => "annonce",
            "url" => $gallery->url,
            "title" => $title,
            "nbthumb" => 4,
            "modal" => true,
            "zoom" => "false",
            "list" => $list
        ];
        
        $meta = new Meta(
            $title, 
            'Jettez un coup d\'oeil sur nos réalisations : '.$title, 
            true, 
            ['realisation', 'gallerie', 'photos', $title], 
            $url, 
            $metaImg,
            'product.group'
        );

        return view('pages/realisation')
            ->with('noContainer', false)
            ->with('title', $title)
            ->with('gallery', $gal)
            ->with('meta', $meta);
    }
}
