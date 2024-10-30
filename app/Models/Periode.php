<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year'];

    public function organizer()
    {
        return $this->hasMany(Organizer::class);
    }
}
