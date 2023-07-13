<?php

namespace App\Repository;

use App\Models\BallModel;
use App\Repository\BallRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class BallRepository implements BallRepositoryInterface
{
    protected $model;

    public function __construct(BallModel $ballModel)
    {
        $this->model = $ballModel;
    }

    /**
     * @param array $request
     * @return \App\Models\BallModel
     */
    public function store(array $request):BallModel{
        return $this->model->updateOrCreate(
            ['name' => $request['name']],
            ['volume' => $request['volume']]
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection{
        return $this->model->select(['id', 'name', 'volume'])->get();
    }
}