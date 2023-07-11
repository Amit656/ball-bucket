<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BallModel extends Model
{
    use HasFactory;

    protected $table = 'balls';

    protected $fillable = ['name', 'volume'];
}
