<?php

namespace App\Services;

use App\Repositories\DepartementRepository;

class DepartementService {
    protected $departementRepository;

    public function __construct(DepartementRepository $departementRepository)
    {
        $this->departementRepository = $departementRepository;
    }

    public function findAll()
    {
        return $this->departementRepository->findAll();
    }
}
