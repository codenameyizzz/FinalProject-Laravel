<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GenreModel extends Model
{
    use HasFactory;

    protected $table="genre";
    protected $fillable=['nama'];

    public function listGenre(): HasMany
    {
        return $this->hasMany(FilmModel::class, 'genre_id');
    }
}
