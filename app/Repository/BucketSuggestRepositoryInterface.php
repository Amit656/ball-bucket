<?php

namespace App\Repository;

use App\Models\BucketSuggestModel;

interface BucketSuggestRepositoryInterface
{
    public function store(array $request):BucketSuggestModel;
}