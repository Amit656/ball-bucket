<?php

namespace App\Repository;


class IndexRepository implements IndexRepositoryInterface
{
    public function index(){
        return view('index');
    }
}