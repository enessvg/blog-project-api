<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;


class SiteSettingRepository
{
    public function getAll()
    {
        return Cache::remember('_site_settings', now()->addMinutes(10), function () {
            return SiteSetting::first();
        });
    }
}
