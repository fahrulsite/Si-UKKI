<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'thumbnail',
        'author_id',
        'category_id',
        'status',
        
    ];

    protected $casts = [
        'status' => 'boolean',
        'category_id' => 'array',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($post){
            if(empty($post->slug) || $post->isDirty('title')){
                $post->slug = Str::slug(($post->title));
            }
        });

        static::creating(function($post){
            $post->author_id = Auth::id();
        });
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id');
    }    

}
