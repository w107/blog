
#### 介绍
一个基于Laravel的博客composer扩展包，专注阅读、支持markdown。

#### 演示：[Inn的博客](http://blog.gog5.cn/)

# 快速安装
环境要求
- Laravel 7
- PHP 7+
- 本博客后台使用是的 `laravel-admin`，安装过`laravel-admin`的请先卸载

首先确保安装好了laravel，并且数据库连接设置正确。

```
composer require inn20/blog
```
然后运行下面的命令来发布资源：

```
php artisan blog:publish
```
在该命令会生成博客与后台的静态资源、配置文件`config/blog.php`、`config/admin.php`。

`blog.php`可以在里面修改博客的路由前缀、数据库表前缀等。
> 注意路由前缀不要和已有的路由重复，否则会被覆盖

`admin.php`配置说明可查看 [https://laravel-admin.org/docs/zh/configuration](https://laravel-admin.org/docs/zh/configuration) ，建议都是用默认配置不修改。

然后运行下面的命令完成安装：

```
php artisan blog:install
```
安装完成之后，前台默认链接 `http://localhost/blog`。

后台 `http://localhost/blog/admin`，使用用户名 admin 和密码 admin登录。

# 版本升级

```
// 更新到最新版本
composer update inn20/blog

// 强制发布静态资源文件
php artisan vendor:publish --tag=inn-blog-assets --force

// 强制发布语言包文件
php artisan vendor:publish --tag=inn-blog-lang --force

// 清理视图缓存
php artisan view:clear
```

# 依赖
- [z-song/laravel-admin](https://github.com/z-song/laravel-admin) 一个可以快速帮你构建后台管理的工具
- [broqiang/mdblog](https://github.com/broqiang/mdblog) 引用了`Bro Qiang 博客`的前端样式

#### 遇到问题欢迎[反馈](https://gog5.cn/posts/7)
