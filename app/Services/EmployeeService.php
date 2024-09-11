<?php

namespace App\Services;

use App\Repositories\DepartementRepository;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeService {
    protected $employeeRepository;
    protected $departementRepository;

    public function __construct(
        EmployeeRepository $employeeRepository,
        DepartementRepository $departementRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->departementRepository = $departementRepository;
    }

    /**
     * Find all employees
     */
    public function findAll()
    {
        return $this->employeeRepository->findAll();
    }

    /**
     * Store an employe
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'departement_id' => 'required|numeric',
            'hired_at' => 'required|date|regex:/\d{4}-\d{2}-\d{2}/',
        ]);

        if (!$this->departementRepository->isExists($validated['departement_id'])) {
            return [
                'errors' => [
                    'departement_id' => "Departement doesn't exists",
                ]
            ];
        }

        if ($this->employeeRepository->isEmailExists($validated['email'])) {
            return [
                'errors' => [
                    'email' => "Email already exists",
                ]
            ];
        }

        $this->employeeRepository->store($validated);

        return [
            'success' => "Employee successfully created"
        ];
    }
}
