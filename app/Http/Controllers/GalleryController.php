<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller{
    public function addPhoto($id,Request $request){
        $gallery = Gallery::find($id);
        if($gallery != null){
            $request->validate([
                'file' => 'required|file|mimes:jpg,jpeg,bmp,png,svg',
            ]);
            
            $base = './img/gallery/'.$gallery->url;
            $filename = time().'.'.$request->file->extension();  
            
            $galleryPhoto = new GalleryPhoto();
            $galleryPhoto->gallery = $gallery->id;
            $galleryPhoto->orderimg = GalleryPhoto::where('gallery',$gallery->id)->max('orderimg') + 1;
            $galleryPhoto->image = $filename;
            $galleryPhoto->status = 0;
            $galleryPhoto->save();

            $request->file->move('img/gallery/'.$gallery->url, $filename);
            
            resizeAndCrop($base.'/'.$filename, $base.'/fit/'.$filename, 912, 513);
            resizeAndCrop($base.'/'.$filename, $base.'/thumbnail/'.$filename, 192, 108);
            resizeAndCrop($base.'/'.$filename, $base.'/'.$filename, 1920, 1080);
            
            return view('admin/line')
                ->with('gallery', $gallery)
                ->with('photo', $galleryPhoto);
        }else{
            abort(404);
        }
    }
    
    public function uploadPhoto(){
        $gallery = Gallery::find($id);
        if($gallery != null){
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,bmp,png,svg',
        ]);
    
        $fileName = time().'.'.$request->file->extension();  
     
        $request->file->move('img/gallery/tmp', $fileName);
        
        return $fileName;
        }else{
            abort(404);
        }
    }
    
    public function getStatus($id){
        $photo = GalleryPhoto::find($id);
        if($photo != null){
            return $photo->status;
        }else{
            abort(404);
        }
    }
    
    public function update($id,Request $request){
        $gallery = Gallery::find($id);
        if($gallery != null){
            if(isset($request->photos)){
                $i=1;
                foreach ($request->photos as $photo) {
                    $galleryPhoto = GalleryPhoto::find($photo['id']);
                    if($galleryPhoto != null){
                        $galleryPhoto->orderimg = $i;
                        $galleryPhoto->title = $photo['title'];
                        $galleryPhoto->localization = $photo['localization'];
                        $galleryPhoto->status = 1;

                        $filename = $this->makeFileName($galleryPhoto);

                        File::move('img/gallery/'.$gallery->url.'/'.$galleryPhoto->image,'img/gallery/'.$gallery->url.'/'.$filename);
                        File::move('img/gallery/'.$gallery->url.'/fit/'.$galleryPhoto->image,'img/gallery/'.$gallery->url.'/fit/'.$filename);
                        File::move('img/gallery/'.$gallery->url.'/thumbnail/'.$galleryPhoto->image,'img/gallery/'.$gallery->url.'/thumbnail/'.$filename);
                        
                        $galleryPhoto->image = $filename;
                        
                        $galleryPhoto->save();
                        $i++;
                    }
                }
            }
        }else{
            abort(404);
        }
    }
    
    public function deletePhotos($galId,Request $request){
        if(isset($request->ids)){
            $gallery = Gallery::find($galId);
            $ids = stringToArray($request->ids);
            foreach ($ids as $id) {
                $galleryPhoto = GalleryPhoto::find($id);
                if($galleryPhoto != null){
                    if($gallery != null){
                        File::delete('img/gallery/'.$gallery->url.'/fit/'.$galleryPhoto->image);
                        File::delete('img/gallery/'.$gallery->url.'/thumbnail/'.$galleryPhoto->image);
                        File::delete('img/gallery/'.$gallery->url.'/'.$galleryPhoto->image);
                    }
                    $galleryPhoto->delete();
                }
            }
        }
    }
    
    private function makeFileName($galleryPhoto){
        $str = '';
        if($galleryPhoto->title != null){
            $str .= $galleryPhoto->title;
        }
        if($galleryPhoto->localization != null){
            if($str != '') $str .= '-';
            $str .= $galleryPhoto->localization;
        }
        if($str != '') $str .= '-';
        $str .= $galleryPhoto->orderimg;
        return $str.'.'.(pathinfo($galleryPhoto->image)['extension']);
    }
}
