<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Database\Gallery;
use App\Models\Database\GalleryPhoto;

class PageController extends Controller{
    public function getIndex(){
        $carousel = array(
            array(
                'image' => 'img/accueil1.jpg',
                'title' => 'Bienvenue sur notre site'
            ),
            array(
                'image' => 'img/accueil2.jpg',
                'title' => 'Maquettiste à épinal dans le Grand Est'
            ),
            array(
                'image' => 'img/accueil3.jpg',
                'title' => 'En savoir plus',
                'page' => 'a-propos'
            ),
            array(
                'image' => 'img/accueil4.jpg',
                'title' => 'Nous contacter',
                'page' => 'contact'
            )
        );
        
        $galList = array();
        $galleries = Gallery::all();
        
        foreach ($galleries as $gallery) {
            $galleryPhoto = GalleryPhoto::where('gallery',$gallery->id)
                    ->where('orderimg',1)
                    ->first();
            
            if(isset($galleryPhoto)){
                array_push($galList, array(
                    'title' => $gallery->title,
                    'url' => $gallery->url,
                    'image' => $galleryPhoto->image
                ));
            }
        }
        
        $meta = new Meta(
            'Bienvenue', 
            'MAC (Maquette d\'Architecture Créations), entreprise spécialisée dans la réalisation de maquette d\'architecture et urbanisme.', 
            true, 
            ['accueil'], 
            null, 
            $carousel,
            'website'
        );

        return view('pages/index')
            ->with('noContainer', true)
            ->with('title', 'Bienvenue sur le site de MAC Onsay')
            ->with('carousel',$carousel)
            ->with('galleries',$galList)
            ->with('meta', $meta);
    }
    
    public function getAPropos(){
        $meta = new Meta(
            'À propos', 
            'Créée en 1982 par M. Gunduz ONSAY, MAC (Maquette Architecture - Créations) est une entreprise individuelle spécialisée dans l\'étude et la réalisation de maquettes d\'architecture et d\'urbanisme.', 
            true, 
            ['a propos','promoteurs', 'immobilier', 'architecte', 'bureau d\'etude'], 
            'a-propos', 
            array(),
            'article'
        );

        return view('pages/apropos')
            ->with('noContainer', false)
            ->with('title', 'À propos')
            ->with('meta', $meta);
    }
    
    public function getContact(){
        $meta = new Meta(
            'Nous contacter', 
            'Une demande ? Une question ? Contactez nous par mail ou par téléphone, ou venez nous rendre visite !', 
            true, 
            ['contact', 'mail', 'telephone', 'adresse', 'carte'], 
            'contact', 
            array(),
            'article'
        );

        return view('pages/contact')
            ->with('noContainer', false)
            ->with('title', 'Nous contacter')
            ->with('meta', $meta);
    }
    
    public function sitemap(){
        return response()
                    ->view('sitemap', [
                        'galleries' => Gallery::all(), 
                    ])
                    ->header('Content-Type', 'text/xml');
    }
    
    public function manifest(){
        return response()
                    ->view('manifest', [
                        'icons' => [
                            16,
                            32,
                            57,
                            60,
                            72,
                            76,
                            96,
                            114,
                            120,
                            160,
                            196
                        ], 
                    ])
                    ->header('Content-Type', 'application/json');
    }
}
