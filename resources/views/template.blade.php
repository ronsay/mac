<!doctype html>
<html lang="fr" class="position-relative">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="resource-type" content="document">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.bootswatch', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.bootswatch', "css") }}" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/main.css">
        @yield('css')
        
        <link rel="manifest" href="{{ url('/') }}/manifest">
    @if(isset($meta))
        @if($meta->getRobots())
        <meta name="robots" content="index, follow, noarchive">
        @else
        <meta name="robots" content="noindex, nofollow, noarchive">
        @endif  
        <meta name="description" content="{!! html_entity_decode($meta->getDescription()) !!}"/>
        <meta name="keywords" content="maquette, architecture, creation, realisation, modelisme, immobilier, epinal, lorraine, grand est, @foreach($meta->getTags() as $tag){{ (!$loop->first && $tag != '') ? ', '.$tag : $tag }}@endforeach"/>
        <meta name="subject" content="Réalisation de maquettes d'architecture">
       
        <meta name="copyright"content="{{ $meta->getAppName() }}">
        <meta name="reply-to" content="{{ $meta->getEmail() }}">
        <meta name="owner" content="{{ $meta->getAppName() }}">
        <meta name="url" content="{{ $meta->getUrl() }}">
        <title>{{$meta->getAppName() }} | {!! $meta->getTitle() !!}</title>

        <link rel="author" href="{{ $meta->getAppName() }}, {{ $meta->getEmail() }}" />
        <link rel="contact" href="{{ $meta->getEmail() }}" />
      
        <link rel="shortcut icon" href="{{ url('/') }}/img/icons/favicon.ico">
        <link rel="apple-touch-icon" type="image/png" sizes="57x57" href="{{ url('/') }}/img/icons/icon-57.png">
        <link rel="apple-touch-icon" type="image/png" sizes="114x114" href="{{ url('/') }}/img/icons/icon-114.png">
        <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="{{ url('/') }}/img/icons/icon-72.png">
        <link rel="apple-touch-icon" type="image/png" sizes="144x144" href="{{ url('/') }}/img/icons/icon-144.png">
        <link rel="apple-touch-icon" type="image/png" sizes="60x60" href="{{ url('/') }}/img/icons/icon-60.png">
        <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="{{ url('/') }}/img/icons/icon-120.png">
        <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="{{ url('/') }}/img/icons/icon-76.png">
        <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="{{ url('/') }}/img/icons/icon-152.png">
        <link rel="icon" type="image/png" sizes="196x196" href="{{ url('/') }}/img/icons/icon-196.png">
        <link rel="icon" type="image/png" sizes="160x160" href="{{ url('/') }}/img/icons/icon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ url('/') }}/img/icons/icon-96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/img/icons/icon-16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/img/icons/icon-32.png">
        
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-navbutton-color" content="#ffffff">
        <meta name="msapplication-starturl" content="/">
        <meta name="msapplication-titlecolor" content="#ffffff">
        <meta name="msapplication-titleimage" content="{{ url('/') }}/img/icons/icon-144.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="{{ $meta->getAppName() }}">
        <meta name="application-name" content="{{ $meta->getAppName() }}"/>

        <meta property="twitter:card" content="{{ $meta->getTwitter()['card'] }}">
        <meta property="twitter:title" content="{!! $meta->getTitle() !!}">
        <meta property="twitter:description" content="{!! html_entity_decode($meta->getDescription()) !!}">
        <meta property="twitter:image" content="{{ $meta->getTwitter()['image'] }}"> 
        <meta property="twitter:image:alt" content="{!! $meta->getTitle() !!}"> 

        <meta property="og:title" content="{!! $meta->getTitle() !!}" />
        <meta property="og:type" content="{{ $meta->getOg()['type'] }}" />
        <meta property="og:url" content="{{ $meta->getUrl() }}" />
        <meta property="og:description" content="{!! html_entity_decode($meta->getDescription()) !!}" />
        <meta property="og:site_name" content="{{ $meta->getAppName() }}" />
        <meta property="og:locale" content="fr_FR">
        @foreach($meta->getOg()['images'] as $image)
        <meta property="og:image" content="{{ $image['url'] }}" />
        <meta property="og:image:type" content="{{ $image['type'] }}" />
        <meta property="og:image:alt" content="{{ $image['title'] }}"> 
        @endforeach
        <meta name="og:email" content="{{ $meta->getEmail() }}"/>
        <meta name="og:phone_number" content="+33329347280"/>
        <meta name="og:locality" content="Epinal"/>
        <meta name="og:region" content="Grand Est"/>
        <meta name="og:country-name" content="France"/>

        <meta property="fb:admins" content="1484217841873182" /> 
        <meta property="fb:pages" content="1484217841873182" />

        <link rel="canonical" href="{{ $meta->getUrl() }}">    
    @else
        <title>MAC Onsay</title>
    @endif   
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light pb-1 mb-3">
            <div class="container">
                <div class="d-flex flex-column w-100">
                    <a class="navbar-brand text-center mx-0 mb-2" href="{{ url('/') }}">
                        <img class="img-fluid" src="{{ url('/') }}/img/logo.png" alt="MAC (Maquette d'Architecture Créations)"/>
                        <span></span>
                    </a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbar">
                        <ul class="navbar-nav text-lowercase">
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/') }}">accueil</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/') }}/a-propos">à propos</a>
                            </li>
                            
                            <li class="nav-item dropdown mx-3">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">nos réalisations</a>
                                <ul class="dropdown-menu">
                                   <li>
                                        <a class="dropdown-item" href="#">immeubles </a>
                                        <ul class="submenu dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('/') }}/realisations/immeubles/1-87">1/87</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/') }}/realisations/immeubles/1-100">1/100</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/') }}/realisations/immeubles/1-160">1/160</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/') }}/realisations/immeubles/1-200">1/200</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('/') }}/realisations/lotissements"> lotissements </a></li>
                                    <li><a class="dropdown-item" href="{{ url('/') }}/realisations/architecture"> architecture </a></li>
                                    <li><a class="dropdown-item" href="{{ url('/') }}/realisations/maisons"> maisons </a></li>
                                    <li><a class="dropdown-item" href="{{ url('/') }}/realisations/divers"> divers </a></li>
                                </ul>
                            </li>
                                 
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/') }}/contact">nous contacter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
    @if(!isset($noContainer) || $noContainer)
        <main class="mb-3">
    @else
        <main class="container mb-3 pb-5">
    @endif
        @if(isset($title) && $title)
            <h1 class="text-center">{{ $title }}</h1>
        @endif
            @yield('content')
        </main>
        <footer class="w-100 position-absolute text-center pt-4 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <img class="footer-logo mb-1" src="{{ url('/') }}/img/logo-simple.png" alt="MAC (Maquette d'Architecture Créations)">
                        <p>MAC (Maquette d'Architecture Créations), entreprise spécialisée dans la réalisation de maquette d'architecture et urbanisme.</p>   
                    </div>
                    <div class="col-12 col-sm-6">
                        <p class="m-1 font-weight-bold"></p>
                        <address class="m-1">
                            <span>MAC - Gunduz Onsay</span>
                            <p>
                                <span>60 rue d'Epinal</span>
                                <span>88190 Golbey</span>
                            </p>
                        </address>
                        <address class="m-1" id="footer-tel">
                            <a href="" class="tel">03.29.34.72.80</a>
                        </address>
                        <address class="m-1" id="footer-mail">
                            <a href="" class="mail">maconsay@gmail.com</a>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="social col-12 my-2">
                        <a href="https://www.facebook.com/mac.onsay" class="m-1" target="_blank"> 
                                <img src="{{ url('/') }}/img/icons/facebook.svg" class="footer-social" alt="Facebook"> 
                        </a> 
                        <a href="https://www.linkedin.com/in/gunduzonsay" class="m-1" target="_blank"> 
                            <img src="{{ url('/') }}/img/icons/linkedin.svg" class="footer-social" alt="LinkedIn"> 
                        </a> 
                    </div>
                </div>
                <div>
                    <small>Copyright © <?php echo date("Y") ?> MAC (Maquette d'Architecture Créations) - Tous droits réservés</small>
                </div>
            </div>
        </footer>  
        <script src="{{ getExtStatic('statics.frameworks.jquery', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.jquery', "js") }}" crossorigin="anonymous"></script>
        <script src="{{ getExtStatic('statics.frameworks.bootstrap', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.bootstrap', "js") }}" crossorigin="anonymous"></script>
        <script src="{{ url('/') }}/js/main.js"></script>
        @yield('script')
        @if(isset($meta))
        <script type="application/ld+json">
            [
                {
                    "@context": "https://schema.org",
                    "@type": "Organization",
                    "name": "{{ $meta->getAppName() }}",
                    "description": "MAC (Maquette d'Architecture Créations), entreprise spécialisée dans la réalisation de maquette d'architecture et urbanisme.",
                    "url" : "{{ $meta->getUrl() }}",
                    "logo": "{{ url('/img/logo-simple.png') }}",
                    "sameAs" : [
                        "https://www.facebook.com/mac.onsay",
                        "https://www.linkedin.com/in/gunduzonsay"
                    ],
                    "email": "{{ $meta->getEmail() }}",
                    "address": {
                        "@type": "PostalAddress",
                        "addressLocality": "Golbey",
                        "postalCode": "88190",
                        "streetAddress": "60 rue d'Epinal"
                    }
                }
                @yield('schemaorg')
            ]
        </script>
        @endif
    </body>
</html>