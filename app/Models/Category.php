<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_category';

    protected $fillable = [
        'genre_category',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'id_category', 'id_category');
    }
}