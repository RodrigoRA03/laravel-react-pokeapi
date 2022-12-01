<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $table = 'torneos';

    protected $guarded = [];

    public function entrenadores()
    {
        return $this->hasMany(Entrenador::class, 'torneo_id', 'id');
    }
}
