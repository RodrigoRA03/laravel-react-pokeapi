<?php

namespace App\Models;

use Database\Factories\EntrenadorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    protected $table = 'entrenadors';

    protected $guarded = [];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id', 'id');
    }

    public function pokemones()
    {
        return $this->hasMany(Pokemon::class, 'entrenador_id', 'id');
    }

    protected static function newFactory()
    {
        return new EntrenadorFactory();
    }
}
