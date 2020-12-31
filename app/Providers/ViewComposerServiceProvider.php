<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
    public function boot() {
        view()->composer("*","App\Http\ViewComposers\MainViewComposer");
        view()->composer("auth/login","App\Http\ViewComposers\LoginViewComposer");
        view()->composer("pages/error","App\Http\ViewComposers\ErrorViewComposer");
    }
}