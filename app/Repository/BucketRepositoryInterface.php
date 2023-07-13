<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface BucketRepositoryInterface
{
    public function store(array $request);
    public function suggestBuckets(array $request);
}