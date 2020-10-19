<!doctype html>
<html lang="fr" class="position-relative">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="resource-type" content="document">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.bootswatch', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.bootswatch', "css") }}" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.iconic', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.iconic', "css") }}" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/main.css">
        @yield('css')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light pb-1 mb-3">
            <div class="container">
                <div class="d-flex flex-column w-100">
                    <a class="navbar-brand text-center mx-0 mb-2" href="{{ url('/') }}">
                        <h1>
                            <img class="img-fluid" src="{{ url('/') }}/img/logo.png" alt="MAC (Maquette d'Architecture Créations)"/>
                            <span></span>
                        </h1>
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
            @yield('content')
        </main>
        <footer class="w-100 position-absolute text-center pt-4 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <img class="footer-logo mb-1" src="{{ url('/') }}/img/logo-simple.png" alt="MAC (Maquette d'Architecture Créations)">
                        <p>MAC (Maquette d'Architecture Créations), entreprise spécialisée dans la réalisation de maquette d'architecture et urbanisme.</p>   
                        <small><a href="{{ url('/') }}/politique-de-confidentialite" target="_blank">Politique de confidentialité</a></small>
                    </div>
                    <div class="col-12 col-sm-6 mt-1">
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
                        <div class="social my-3"> 
                            <a href="https://www.facebook.com/mac.onsay" class="m-1" target="_blank"> 
                                <img src="{{ url('/') }}/img/icons/facebook.svg" class="footer-social" alt="Facebook"> 
                            </a> 
                            <a href="https://www.linkedin.com/in/gunduzonsay/" class="m-1" target="_blank"> 
                                <img src="{{ url('/') }}/img/icons/linkedin.svg" class="footer-social" alt="LinkedIn"> 
                            </a> 
                        </div>
                    </div>
                </div>
            <p>
                <small>Copyright © <?php echo date("Y") ?> MAC (Maquette d'Architecture Créations) - Tous droits réservés</small>
            </p>
            </div>
        </footer>  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key="></script>
        <script src="{{ url('/') }}/js/main.js"></script>
        @yield('script')
    </body>
</html>