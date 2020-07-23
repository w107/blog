<?php

namespace Inn20\Blog\Controllers;

use Inn20\Blog\Models\Category;
use Inn20\Blog\Services\PostService;

class CategoryController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show(Category $category)
    {
        $posts = $this->postService->byCategory($category);
        return view('blog::posts/index', compact('posts', 'category'));
    }

}
