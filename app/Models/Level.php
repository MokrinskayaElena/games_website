<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
