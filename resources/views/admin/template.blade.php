<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <link rel="shortcut icon" href="{{ url('/') }}/img/icons/favicon.ico">
        <title>MAC Onsay | Administration</title>
        <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.bootswatch', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.bootswatch', "css") }}" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ getExtStatic('statics.frameworks.iconic', "css") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.iconic', "css") }}" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/admin.css">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/dropzone.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/admin') }}">MAC Onsay | Administration</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Change la navigation">
                        <span class="oi oi-caret-bottom"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                        @if(isset($user))
                            <li class="nav-item"><p class="navbar-text">({{ $user->name }})</p></li>
                        @endif
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" target="_blank">Voir le site</a></li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">
                                        Se déconnecter
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div>
            
        <div class="d-block d-md-none">
            <div class="alert alert-danger text-center" role="alert">
                Uniquement accessible sur grand écrans.
            </div>
        </div>
        
        <main class="container-fluid pl-0 d-none d-md-block">
            <div class="row">
                <div class="col-3 menu">
                    <ul class="list-group">
                @if(isset($galleries))
                    @foreach($galleries as $gallery)
                        <li class="list-group-item"><a href="{{ url('/admin/'.$gallery->id) }}" class="text-dark">{{ $gallery->title }}</a></li>
                    @endforeach
                @endif
                    </ul>
                </div>
                <div class="col-9 mt-2">
                    @yield('content')
                </div>
            </div>
        </main>
        
        <div id="loader"></div>
        <div id="saved"></div>

        <script src="{{ getExtStatic('statics.frameworks.jquery', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.jquery', "js") }}" crossorigin="anonymous"></script>
        <script src="{{ getExtStatic('statics.frameworks.popper', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.popper', "js") }}" crossorigin="anonymous"></script>
        <script src="{{ getExtStatic('statics.frameworks.bootstrap', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.bootstrap', "js") }}" crossorigin="anonymous"></script>
	<script src="{{ getExtStatic('statics.frameworks.dropzone', "js") }}" integrity="{{ getExtStaticIntegrity('statics.frameworks.dropzone', "js") }}" crossorigin="anonymous"></script>
        
        <script>
            var urlPath = '{{ url('/') }}';
            var token = '{{ csrf_token() }}';
        </script>    
        <script src="{{ url('/') }}/js/admin.js"></script>
        <script src="{{ url('/') }}/js/dropzone.js"></script>
    </body>
</html>