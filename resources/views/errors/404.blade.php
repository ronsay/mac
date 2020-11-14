@extends('template')

@section('content')
    <section class="text-center">
        <h1>Page inexistante !</h1>
        <p>La page que vous essayez d'accéder n'existe pas.</p>
        <div class="py-3">
            <a href="{{ url('/') }}">
                <img class="img-fluid" src="{{ url('/') }}/img/logo-simple.png"/>
            </a>
        </div>
        <a href="{{ url('/') }}">Retourner à la page d'accueil</a>
    </section>
@stop