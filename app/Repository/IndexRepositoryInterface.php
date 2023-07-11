<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\Paginator;
use Modules\Warehouse\App\Models\Warehouse;

interface IndexRepositoryInterface
{
    public function index();
}