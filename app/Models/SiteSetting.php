<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'favicon',
        'icon',
        'description',
        'keywords',
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    protected static function boot(){

        parent::boot();

        static::created(function($post){
            Cache::forget('_site_settings');
        });

        static::updated(function($post){
            Cache::forget('_site_settings');
        });

        static::deleted(function($post){
            Cache::forget('_site_settings');
        });

    }
}
