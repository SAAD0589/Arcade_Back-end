<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_requirement';

    protected $fillable = [
        'CPU_requirement',
        'GPU_requirement',
        'Memory_requirement',
        'VRAM_requirement',
        'Storage_requirement',
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'id_requirement', 'id_requirement');
    }
}