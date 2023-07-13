<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\IndexRepositoryInterface;

class IndexController extends Controller
{
    private IndexRepositoryInterface $indexRepository;

    public function __construct(IndexRepositoryInterface $indexRepository)
    {
        $this->indexRepository = $indexRepository;
    }

    public function index(){
        
        return $this->indexRepository->index();
    }
}
