<?php

if (!function_exists('__blog')) {

    /**
     * Translate the given message.
     *
     * @param  string|null  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return string
     */
    function __blog($key = null, $replace = [], $locale = null)
    {
        return trans('blog.'.$key, $replace, $locale);
    }
}

if (!function_exists('blog_setting')) {

    /**
     * @param  string  $key
     * @return string
     */
    function blog_setting($key)
    {
        return \Inn20\Blog\Services\SettingService::get($key);
    }
}

if (!function_exists('blog_route')) {
    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function blog_route($name, $parameters = [], $absolute = true)
    {
        return route('blog.'.$name, $parameters, $absolute);
    }
}

if (!function_exists('get_full_table')) {
    function get_full_table($table)
    {
        return config('blog.database.prefix').$table;
    }
}