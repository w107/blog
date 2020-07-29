<?php

namespace Inn20\Blog\Services;

use Illuminate\Support\Facades\Cache;
use Inn20\Blog\Models\Setting;

class SettingService
{
    protected static $settings;

    const CACHE_KEY = 'blog:settings';

    static public function get($key)
    {
        return self::all()[$key] ?? '';
    }

    static public function all()
    {
        if (is_null(self::$settings)) {
            self::$settings = Cache::remember(self::CACHE_KEY, 3600, function () {
                return Setting::all()->pluck('value', 'key')->toArray();
            });
        }
        return self::$settings;
    }

    static public function forgetCache()
    {
        Cache::forget(self::CACHE_KEY);
        // 兼容swoole框架
        self::$settings = null;
    }

}