<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VolunteerCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'slug',
    ];

    protected static function boot(){
        parent::boot();

        static::saving(function($volunteerCategory){
            if(empty($volunteerCategory->slug) || $volunteerCategory->isDirty('name')){
                $volunteerCategory->slug = Str::slug(($volunteerCategory->name));
            }
        });
    }

    public function volunteer():HasMany{
        return $this->hasMany(Volunteer::class);
    }
}
