<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pelicula extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'actor_pelicula');
    }
}
