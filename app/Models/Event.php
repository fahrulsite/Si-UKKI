<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
        'title',
        'slug',
        'body',
        'starts_at',
        'ends_at',
        'organized_id',
        'event_category_id',
        'url',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'event_category_id' => 'array',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($event){
            if(empty($event->slug) || $event->isDirty('title')){
                $event->slug = Str::slug(($event->title));
            }
        });

        static::creating(function($event){
            $event->organized_id = Auth::id();
        });
    }

    public function eventCategory():BelongsTo{
        return $this->belongsTo(EventCategory::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'organized_id');
    }    
}
