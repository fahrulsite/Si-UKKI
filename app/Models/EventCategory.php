<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'slug',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($eventCategory){
            if(empty($eventCategory->slug) || $eventCategory->isDirty('name')){
                $eventCategory->slug = Str::slug(($eventCategory->name));
            }
        });
    }

    public function event():HasMany{
        return $this->hasMany(Event::class);
    }

}
