<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;



class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'image',
        'content',
        'is_visible',
        'post_views',
        'start_date',
        'end_date',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    protected static function boot(){

        parent::boot();

        static::created(function($post){
            Cache::forget('_all_posts');
            Cache::forget('_popular_post');
        });

        static::updated(function($post){
            Cache::forget('_all_posts');
            Cache::forget('_popular_post');
        });

        static::deleted(function($post){
            Cache::forget('_all_posts');
            Cache::forget('_popular_post');
        });

    }

    public function scopeVisible(Builder $query)
    {
        return $query->where('is_visible', 1);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(){

        return $this->hasMany(Comments::class); //hasmany sayesinde with kullanabiliyorum.
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
