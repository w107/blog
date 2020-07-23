<?php

namespace Inn20\Blog\Services;

use Inn20\Blog\Models\Navigation;
use Inn20\Blog\Models\Tag;

class AppService
{

    static public function viewShare()
    {
        view()->share('sidebar_navigations', Navigation::reverseOrder()->get());
        view()->share('sidebar_tags', Tag::all());

        /*view()->composer('blog::*', function ($view) {
            $view->with('sidebar_navigations', Navigation::all());
            $view->with('sidebar_tags', Tag::all());
        });*/
    }

}