<?php

use App\Models\Partner;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('get_setting_value')) {
    function get_setting_value($key) {
        return Cache::remember("setting_{$key}", 60, function() use ($key) {
            $data = Setting::where("key", $key)->first();
            return $data->value ?? 'empty';
        });
    }
}

if (!function_exists('get_section_data')) {
    function get_section_data($key) {
        return Cache::remember("section_{$key}", 60, function() use ($key) {
            return Section::where('post_as', $key)->first();
        });
    }
}

if (!function_exists('get_partner')) {
    function get_partner() {
        return Cache::remember('partners', 60, function() {
            return Partner::all();
        });
    }
}