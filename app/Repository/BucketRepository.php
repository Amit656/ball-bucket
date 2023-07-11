<?php

namespace App\Repository;

use App\Models\BucketModel;
use App\Repository\BucketRepositoryInterface;


class BucketRepository implements BucketRepositoryInterface
{
    protected $model;

    public function __construct(BucketModel $buckerModel)
    {
        $this->model = $buckerModel;
    }

    public function store(array $request){
        return $this->model->create($request);
    }
}