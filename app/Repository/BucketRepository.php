<?php

namespace App\Repository;

use App\Models\BucketModel;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\BucketRepositoryInterface;


class BucketRepository implements BucketRepositoryInterface
{
    protected $model;

    public function __construct(BucketModel $buckerModel)
    {
        $this->model = $buckerModel;
    }

    public function store(array $request){
        return $this->model->updateOrCreate(
            ['name' => $request['name']],
            ['volume' => $request['volume']]
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function suggestBuckets(array $request){
        $buckets = $this->model->select(['id', 'name', 'volume'])->get();
        $balls = app(BallRepositoryInterface::class)->index();

        $minimumBuckets = 0;
        foreach ($balls as $ball) {
            $bucket = $this->findBucketForBall($ball, $buckets);
            if ($bucket === null) {
                $minimumBuckets++;
            }
        }
        return $minimumBuckets;
    }

    private function findBucketForBall($ball, $buckets)
    {
        foreach ($buckets as $bucket) {
            if ($bucket->volume >= $ball->volume) {
                return $bucket;
            }
        }

        return null;
    }
}