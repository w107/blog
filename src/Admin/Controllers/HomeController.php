<?php

namespace Inn20\Blog\Admin\Controllers;

use Encore\Admin\Admin;
use Illuminate\Support\Arr;
use Inn20\Blog\Blog;
use Inn20\Blog\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Dashboard')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(6, function (Column $column) {
                    $column->append($this->environment());
                });

                /*$row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });*/

                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }

    protected function environment()
    {
        $envs = [
            ['name' => 'Blog version',      'value' => Blog::VERSION],
            ['name' => 'Admin version',     'value' => Admin::VERSION],
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        return view('admin::dashboard.environment', compact('envs'));
    }

}
