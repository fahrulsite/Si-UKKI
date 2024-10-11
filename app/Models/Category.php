<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'status',

    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($category){
            if(empty($category->slug) || $category->isDirty('name')){
                $category->slug = Str::slug(($category->name));
            }
        });
    }

    public function posts():HasMany{
        return $this->hasMany(Post::class);
    }
}
