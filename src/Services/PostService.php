<?php

namespace Inn20\Blog\Services;

use Inn20\Blog\Models\Category;
use Inn20\Blog\Models\Post;
use Inn20\Blog\Models\Tag;

class PostService
{

    public function all()
    {
        $query = $this->tapQuery(new Post());
        return $query->get();
    }

    public function byCategory(Category $category)
    {
        $query = $this->tapQuery($category->posts());
        return $query->get();
    }

    public function byTag(Tag $tag)
    {
        $query = $this->tapQuery($tag->posts());
        return $query->get();
    }

    // 公共条件
    protected function tapQuery($query)
    {
        return $query->reverseOrder()->recent()->published()->post()->with('category');
    }

}