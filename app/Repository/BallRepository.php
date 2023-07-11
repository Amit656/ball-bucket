<?php

namespace App\Repository;

use App\Models\BallModel;
use App\Repository\BallRepositoryInterface;


class BallRepository implements BallRepositoryInterface
{
    protected $model;

    public function __construct(BallModel $ballModel)
    {
        $this->model = $ballModel;
    }

    public function store(array $request){
        return $this->model->create($request);
    }
}