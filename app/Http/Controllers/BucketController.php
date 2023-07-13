<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\BucketStoreRequest;
use App\Http\Requests\SuggestBucketRequest;
use App\Repository\BucketRepositoryInterface;

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

    public function suggestBuckets(SuggestBucketRequest $request)
    {
        return $this->bucketRepository->suggestBuckets($request->validated());
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
