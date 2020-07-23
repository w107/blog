<?php

namespace Inn20\Blog\Seeds;

use Encore\Admin\Auth\Database\AdminTablesSeeder;
use Encore\Admin\Auth\Database\Menu;

class AdminSeeder extends AdminTablesSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();

        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => '文章',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'posts',
            ],
            [
                'parent_id' => 0,
                'order'     => 9,
                'title'     => '导航栏',
                'icon'      => 'fa-ellipsis-h',
                'uri'       => 'navigations',
            ],
            [
                'parent_id' => 0,
                'order'     => 10,
                'title'     => '标签',
                'icon'      => 'fa-hashtag',
                'uri'       => 'tags',
            ],
            [
                'parent_id' => 0,
                'order'     => 11,
                'title'     => '分类',
                'icon'      => 'fa-clone',
                'uri'       => 'categories',
            ],
            [
                'parent_id' => 0,
                'order'     => 12,
                'title'     => '设置',
                'icon'      => 'fa-navicon',
                'uri'       => 'settings',
            ],
        ]);
    }
}
