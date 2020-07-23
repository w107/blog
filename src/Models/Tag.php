<?php

namespace Inn20\Blog\Models;

class Tag extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->setTable(get_full_table('tags'));
        parent::__construct($attributes);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, get_full_table('post_tag'));
    }

    public function link($params = [])
    {
        return blog_route('tags.show', array_merge([$this->title], $params));
    }

}