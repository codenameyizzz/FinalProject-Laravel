<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmModel extends Model
{
    use HasFactory;

    protected $table="film";
    protected $fillable=['judul', 'ringkasan', 'tahun', 'poster', 'genre_id'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(GenreModel::class, 'genre_id');
    }

    public function critics() {
        return $this->hasMany(Review::class,'film_id');
    }
}
