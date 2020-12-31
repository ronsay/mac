<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App;
use App\Helpers\CgvHelper;

class MainViewComposer {

    public function compose(View $view) {
        $view->with('staticType', App::environment('prod') ? '.min' : '');
    }
}
