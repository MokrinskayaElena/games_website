<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'user_levels';

    // protected $fillable = ['user_id', 'level_id'];
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
