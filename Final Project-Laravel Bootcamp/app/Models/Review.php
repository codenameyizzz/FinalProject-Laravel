<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table="critics";
    protected $fillable=['user_id', 'film_id', 'content', 'point'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}