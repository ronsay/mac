@extends('template')

@section('content')
<div class="container pb-5">
    <div class="row">
        <div class="col-12 offset-md-2 col-md-8 pt-4">
            <div class="card">
                <div class="card-header">S'enregistrer</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-form-label">Identifiant</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Mot de passe</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-form-label">Confirmer le mot de passe</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('login') }}">
                                Déjà enregistré?
                            </a>
                            <div>
                                <button class="btn btn-primary">
                                    S'enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
    