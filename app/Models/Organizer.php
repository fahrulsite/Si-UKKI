<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nim',
        'address',
        'fakulty',
        'class',
        'generation',
        'gender',
        'place_of_birth',
        'year_of_birth',
        'phone_number',
        'instagram',
        'management',
        'graduated',
        'job',
        'place_of_job',
        'DD1',
        'DD2',
        'DD3',
        'achievement',
    ];

    protected $casts = [
        'management' => 'json'
    ];

    public function periodes()
    {
        // return $this->belongsToMany(Periode::class);
        return $this->belongsToMany(Periode::class, DB::raw("JSON_UNQUOTE(JSON_EXTRACT(management, '$[0]'))"));
        
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
        
    }
}
