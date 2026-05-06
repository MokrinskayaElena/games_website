<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    // Если есть временные метки
    public $timestamps = false;

    //  fillable для массового присвоения
    protected $fillable = ['name', 'genre', 'release_date', 'developer'];
}
