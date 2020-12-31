@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/apropos{{ $staticType }}.css">
@stop

@section('script')

@stop

@section('content')
    <section class="text-justify">
        <p>Créée en 1982 par M. Gunduz ONSAY, MAC (Maquette Architecture - Créations) est une entreprise individuelle spécialisée dans l'étude et la réalisation de maquettes d'architecture et d'urbanisme.</p>
        <p>Localisés près d’Épinal (88), nous travaillons principalement avec des clients du Grand Est (Alsace, Lorraine et Franche-Comté), mais également avec des clients de la région parisienne et du sud de la France. Notre clientèle est variée : promoteurs immobiliers, architectes et bureaux d'étude. Nous coopérons également avec les collectivités, et les lieux culturels.</p>
        <p>Nos valeurs primordiales sont notre engagement, la qualité dans le respect des délais et des coûts, et la satisfaction de nos clients. De nombreux clients fidèles nous font aujourd'hui confiance, et font appel régulièrement à nos prestations, pour la réalisation de leurs projets.</p>
        <p>Pour toute information complémentaire sur nos prestations, vous pouvez <a href="">nous contacter</a>.</p>
        <p>Vous pouvez également suivre nos réseaux sociaux :</p>
        <div class="row text-center">
            <div class="col-12 offset-md-2 col-md-4 my-2">
                <a href="https://www.facebook.com/mac.onsay">
                    <img src="{{ url('/') }}/img/icons/facebook.svg" class="scl-ntw mr-2" alt="Facebook">
                    <h2 class="d-inline">Page Facebook</h2>
                </a>
            </div>
            <div class="col-12 col-md-4 my-2">
                <a href="https://www.linkedin.com/in/gunduzonsay">
                    <img src="{{ url('/') }}/img/icons/linkedin.svg" class="scl-ntw mr-2" alt="LinkedIn">
                    <h2 class="d-inline">Compte LinkedIn</h2>
                </a>
            </div>
        </div>
    </section>
    <section class="my-3">
        <div class="row">
            <div class="col-12 offset-md-2 col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" preload="none" autoplay="" loop="" muted="true">
                        <source src="{{ url('/img/presentation.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>
@stop

@section('schemaorg')
                ,{
                    "@context": "https://schema.org",
                    "@type": "VideoObject",
                    "name": "{{ $meta->getAppName() }} - Présentation",
                    "description": "Vidéo de présentation de la société MAC Onsay",
                    "uploadDate": "2020-01-01",
                    "contentUrl": "{{ url('/img/presentation.mp4') }}",
                    "thumbnailUrl": "{{ url('/img/logo-simple.png') }}"
                }
@stop