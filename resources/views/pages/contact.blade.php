@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/contact.css">
@stop

@section('script')
    <script src="{{ url('/') }}/js/contact.js"></script>
@stop

@section('content')
    <h2>Nous contacter</h2>
    
    <section class="text-center">
        <address>
            <p class="font-weight-bold">MAC - M. Gunduz ONSAY</p>
            <p>
                <span>60 rue d'Epinal</span><br>
                <span>88190 Golbey</span>
            </p>
        </address>

        <address>
            <p><a href="" class="tel">03.29.34.72.80</a></p>
            <p><a href="" class="mail">maconsay@gmail.com</a></p>
        </address>
    </section>
    
    <section>
        <div class="row my-3">
            <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
                <div id="map"></div>
            </div>
        </div>
    </section>
@stop