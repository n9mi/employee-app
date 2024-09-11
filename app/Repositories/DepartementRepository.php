<?php

namespace App\Repositories;

use App\Models\Departement;

class DepartementRepository {
    protected $departement;

    public function __construct(Departement $departement)
    {
        $this->departement = $departement;
    }

    /**
     * Find all departement
     */
    public function findAll()
    {
        return $this->departement
            ->select('id', 'name')
            ->get();
    }

    /**
     * Check if departement exists
     */
    public function isExists($id)
    {
        return $this->departement
            ->where('id', $id)
            ->exists();
    }
}
