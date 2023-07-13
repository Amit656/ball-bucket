<?php

namespace App\Repository;

use App\Models\BallModel;
use Illuminate\Database\Eloquent\Collection;

interface BallRepositoryInterface
{
    public function store(array $request):BallModel;
    public function index(): Collection;
}