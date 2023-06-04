<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'description_comment',
        'id_user',
        'id_game',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_game', 'id_game');
    }
}