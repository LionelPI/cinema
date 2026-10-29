<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    protected $fillable = [
        'titre',
        'genre',
        'duree',
        'description',
        'date_sortie',
        'affiche',
    ];

    public function seances(): HasMany
    {
        return $this->hasMany(Seance::class);
    }
}
