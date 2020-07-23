<?php

namespace Inn20\Blog\Seeds;

use Illuminate\Database\Seeder;
use Inn20\Blog\Models\Category;
use Inn20\Blog\Models\Navigation;
use Inn20\Blog\Models\Post;
use Inn20\Blog\Models\Setting;
use Inn20\Blog\Models\Tag;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::truncate();
        Navigation::create([
            'title' => '首页',
            'url' => '/',
            'description' => '列表',
        ]);

        Category::truncate();
        Category::create([
            'title' => '默认分类',
            'description' => '',
        ]);

        Tag::truncate();
        Tag::create([
            'title' => 'Laravel',
        ]);

        Post::truncate();
        Category::first()->posts()->create([
            'title' => 'Hello world',
            'content' => '如果您看到这篇文章,表示您的博客已经安装成功.',
            'type' => Post::TYPE_POST,
            'published' => 1,
        ]);
    }


}
