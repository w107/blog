<?php

namespace Inn20\Blog\Controllers;

use Inn20\Blog\Models\Post;

class SitemapController extends Controller
{
    public function index(Post $post)
    {
        return $post->published()->get()->map(function ($post, $key) {
            return $post->link();
        })->implode(PHP_EOL);
    }
}
