<?php

namespace Inn20\Blog\Seeds;

use Illuminate\Database\Seeder;
use Inn20\Blog\Models\Category;
use Inn20\Blog\Models\Navigation;
use Inn20\Blog\Models\Post;
use Inn20\Blog\Models\Setting;
use Inn20\Blog\Services\SettingService;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->firstOrCreate('name', 'Inn 博客', 'text', '应用名称');
        $this->firstOrCreate('icp', 'icp', 'text', 'icp 备案信息，需要填入你自己的备案号');
        $this->firstOrCreate('notice', '本博客基于Laravel7搭建，点击 <a href="https://github.com/inn20/blog" target="_blank">Github</a> 了解更多，如果你喜欢本博客，欢迎 <a href="https://github.com/inn20/blog" target="_blank">Star</a>， 感谢！',
            'textarea', '侧边公告栏');
        $this->firstOrCreate('friendship_link', '<li class="mb-2"><a href="https://www.gog5.cn" target="_blank">Inn的博客</a></li><li class="mb-2"><a href="https://github.com/inn20/blog" target="_blank">本博客Github仓库</a></li>',
            'textarea', '友情链接');
        $this->firstOrCreate('keywords', 'laravel,javascript,php,编程,开发,博客', 'textarea', '站点关键词，请以半角逗号 "," 分割多个关键字');
        $this->firstOrCreate('description', '记录分享本人程序开发生涯中所学所得，研究互联网产品和技术', 'textarea', '站点描述');
        $this->firstOrCreate('script', '<script>console.log("Hello World");</script>', 'textarea', '底部自定义js脚本');
        $this->firstOrCreate('changyan_config', '', 'textarea', "畅言云评论配置，为空不开启。例:{appid: 'cyLG',conf: 'prod_b92a397'}");

        SettingService::forgetCache();
    }

    protected function firstOrCreate($key, $value, $type, $comment)
    {
        Setting::firstOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'comment' => $comment,
            ]
        );
    }

}
