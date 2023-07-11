<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BallStoreRequest;
use App\Repository\BallRepositoryInterface;
use Illuminate\Http\Response;

class BallController extends Controller
{
    private BallRepositoryInterface $ballRepository;

    public function __construct(BallRepositoryInterface $ballRepository)
    {
        $this->ballRepository = $ballRepository;
    }

    public function store(BallStoreRequest $request){
        return response()->json($this->ballRepository->store($request->validated()), Response::HTTP_CREATED);
    }
}
