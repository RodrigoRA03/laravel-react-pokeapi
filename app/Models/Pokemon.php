<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemones';

    protected $guarded = [];

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class, 'entrenaor_id', 'id');
    }
}
