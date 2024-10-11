<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'author_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($profil){
            if(empty($profil->slug) || $profil->isDirty('title')){
                $profil->slug = Str::slug(($profil->title));
            }
        });

        static::creating(function($profil){
            $profil->author_id = Auth::id();
        });
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }    
}