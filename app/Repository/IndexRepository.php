<?php

namespace App\Repository;


class IndexRepository implements IndexRepositoryInterface
{
    public function index(){
        $balls = app(BallRepositoryInterface::class)->index();
        return view('index', compact('balls'));
    }
}