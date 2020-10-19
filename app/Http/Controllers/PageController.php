<?php

namespace App\Http\Controllers;

class PageController extends Controller{
    public function getIndex(){
        /*$meta = new Meta(
            'À propos', 
            'matchmycar est un nouvel acteur du véhicule d\'occasion qui propose aux particuliers des services et des voitures de qualité, au meilleur prix.', 
            true, 
            ['ingénieur', 'ESTACA', 'marketing', 'HEC', 'Paris', 'constructeur', 'fournisseur'], 
            'a-propos', 
            array(), 
            'summary_large_image', 
            'article'
        );*/

        return view('pages/index')
            ->with('noContainer', true)
            ->with('title', 'À propos')
            ->with('meta', null);
    }
    
    public function getAPropos(){
        /*$meta = new Meta(
            'À propos', 
            'matchmycar est un nouvel acteur du véhicule d\'occasion qui propose aux particuliers des services et des voitures de qualité, au meilleur prix.', 
            true, 
            ['ingénieur', 'ESTACA', 'marketing', 'HEC', 'Paris', 'constructeur', 'fournisseur'], 
            'a-propos', 
            array(), 
            'summary_large_image', 
            'article'
        );*/

        return view('pages/apropos')
            ->with('noContainer', false)
            ->with('title', 'À propos')
            ->with('meta', null);
    }
    
    public function getContact(){
        /*$meta = new Meta(
            'À propos', 
            'matchmycar est un nouvel acteur du véhicule d\'occasion qui propose aux particuliers des services et des voitures de qualité, au meilleur prix.', 
            true, 
            ['ingénieur', 'ESTACA', 'marketing', 'HEC', 'Paris', 'constructeur', 'fournisseur'], 
            'a-propos', 
            array(), 
            'summary_large_image', 
            'article'
        );*/

        return view('pages/contact')
            ->with('noContainer', false)
            ->with('title', 'À propos')
            ->with('meta', null);
    }
}
