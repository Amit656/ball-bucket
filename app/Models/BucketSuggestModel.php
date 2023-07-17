<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketSuggestModel extends Model
{
    use HasFactory;

    protected $table = 'bucket_suggetions';

    protected $fillable = [
        'ulid',
        'bucket_suggetions'
    ];

    protected $casts = [
        'bucket_suggetions' => 'array'
    ];

}
