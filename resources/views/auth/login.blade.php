@extends('template')

@section('content')
<div class="container pb-5">
    <x-jet-validation-errors class="mb-4" />

    <div class="col-12 p-1">
        <div class="col-12 offset-md-2 col-md-8 pt-4">
            <div class="card">
                <div class="card-header">S'authentifier</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label">Identifiant</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Mot de passe</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="form-group">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                            </label>
                        </div>

                        <div class="mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif

                            <button class="btn btn-primary">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
