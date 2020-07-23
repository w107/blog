<?php

namespace Inn20\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Parsedown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    const TYPE_POST = 1;
    const TYPE_PAGE = 2;
    static $type_map = [
        self::TYPE_POST => '文章',
        self::TYPE_PAGE => '单页面',
    ];

    public function __construct(array $attributes = [])
    {
        $this->setTable(get_full_table('posts'));
        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, get_full_table('post_tag'));
    }

    public function link($params = [])
    {
        return blog_route('posts.show', array_merge([$this->id], $params));
    }

    public function contentToHtml()
    {
        $parsedown = new Parsedown();
        return $parsedown->text($this->content);
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published', 1);
    }

    public function scopePost(Builder $query)
    {
        return $query->where('type', self::TYPE_POST);
    }

    public function scopePage(Builder $query)
    {
        return $query->where('type', self::TYPE_PAGE);
    }

    public function visit()
    {
        $this->increment('view_count', 1);
    }

}