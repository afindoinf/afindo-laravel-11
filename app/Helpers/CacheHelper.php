<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function refreshAksesCache()
    {
        $akses = new \App\Models\Akseslevel();
        $allAksesLevel = $akses->get_server_fitur();
        Cache::forever('all_akses', $allAksesLevel);
        return $allAksesLevel;
    }

    public static function getAksesCache()
    {
        return Cache::rememberForever('all_akses', function () {
            return self::refreshAksesCache();
        });
    }
}
