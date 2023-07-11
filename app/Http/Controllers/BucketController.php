<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BucketStoreRequest;
use App\Repository\BucketRepositoryInterface;
use Illuminate\Http\Response;

class BucketController extends Controller
{
    private BucketRepositoryInterface $bucketRepository;

    public function __construct(BucketRepositoryInterface $bucketRepository)
    {
        $this->bucketRepository = $bucketRepository;
    }

    public function store(BucketStoreRequest $request){
        return response()->json($this->bucketRepository->store($request->validated()), Response::HTTP_CREATED);
        return $this->bucketRepository->store($request->validated());
    }

    public function suggest()
    {
        $balls = Ball::all();
        $buckets = Bucket::all();

        $minimumBuckets = 0;
        foreach ($balls as $ball) {
            $bucket = $this->findBucketForBall($ball, $buckets);
            if ($bucket === null) {
                $minimumBuckets++;
            }
        }

        return view('ball-bucket-suggestion', compact('minimumBuckets'));
    }

    private function findBucketForBall(Ball $ball, $buckets)
    {
        foreach ($buckets as $bucket) {
            if ($bucket->capacity >= $ball->size) {
                return $bucket;
            }
        }

        return null;
    }
}
