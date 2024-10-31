<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Volunteer extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'title',
        'slug',
        'body',
        'closed_at',
        'organized_id',
        'volunteer_category_id',
        'url',
    ];

    protected $casts = [
        'volunteer_category_id' => 'array',
    ];
    protected static function boot(){
        parent::boot();

        static::saving(function($volunteer){
            if(empty($volunteer->slug) || $volunteer->isDirty('title')){
                $volunteer->slug = Str::slug(($volunteer->title));
            }
        });

        static::creating(function($id){
            $id->organized_id = Auth::id();
        });
    }

    public function volunteerCategory():BelongsTo{
        return $this->belongsTo(VolunteerCategory::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'organized_id');
    }    
}
