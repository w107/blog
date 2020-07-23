<?php

namespace Inn20\Blog\Models;

class Category extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->setTable(get_full_table('categories'));
        parent::__construct($attributes);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function link($params = [])
    {
        return blog_route('categories.show', array_merge([$this->id], $params));
    }

}