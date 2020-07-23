<?php

namespace Inn20\Blog\Controllers;

use Inn20\Blog\Models\Post;
use Inn20\Blog\Services\PostService;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->all();
        return view('blog::posts/index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->visit();
        $keywords = implode(',', $post->tags->pluck('title')->toArray());
        return view('blog::posts/show', compact('post', 'keywords'));
    }

}
