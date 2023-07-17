<?php

namespace App\Repository;

use App\Models\BallModel;
use Illuminate\Support\Str;
use App\Models\BucketSuggestModel;
use App\Repository\BallRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\BucketSuggestRepositoryInterface;


class BucketSuggestRepository implements BucketSuggestRepositoryInterface
{
    protected $model;

    public function __construct(BucketSuggestModel $bucketSuggestModel)
    {
        $this->model = $bucketSuggestModel;
    }

    /**
     * @param array $request
     * @return \App\Models\BucketSuggestModel
     */
    public function store(array $request):BucketSuggestModel{
        return $this->model->create(['ulid' => Str::uuid()->toString(), 'bucket_suggetions' => $request]);
    }
}