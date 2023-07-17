<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketModel extends Model
{
    protected $table = 'buckets';

    protected $fillable = ['name', 'volume', 'ball_count', 'empty_volume'];
}
