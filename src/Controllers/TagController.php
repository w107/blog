<?php

namespace Inn20\Blog\Controllers;

use Inn20\Blog\Models\Tag;
use Inn20\Blog\Services\PostService;

class TagController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show(Tag $tag)
    {
        $selected_tag = $tag->title;
        $posts = $this->postService->byTag($tag);
        return view('blog::posts/index', compact('posts', 'selected_tag', 'tag'));
    }

}
