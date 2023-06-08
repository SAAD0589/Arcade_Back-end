<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_game';

    protected $fillable = [
        'name_game',
        'link_game',
        'dateS_game',
        'description_game',
        'image_game',
        'id_requirement',
        'id_category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'id_requirement', 'id_requirement');
    }

    public function downloads()
    {
        return $this->belongsToMany(User::class, 'downloads', 'id_game', 'id_user')
            ->withPivot('dateD_download')
            ->withTimestamps();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'id_game', 'id_user')
            ->withTimestamps();
    }
}