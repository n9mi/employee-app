<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository {
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Find all employees
     */
    public function findAll()
    {
        return $this->employee
            ->select(
                'employees.id',
                'employees.name',
                'employees.email',
                'departements.id as departement_id',
                'departements.name as departement_name',
                'employees.hired_at',
                'employees.profile_pict_link')
            ->join('departements',
                'departements.id', '=', 'employees.departement_id')
            ->latest('employees.created_at')
            ->get();
    }

    /**
     * Check if employee with specified email already exists
     */
    public function isEmailExists(string $email)
    {
        return $this->employee
            ->where('email', '=', strtolower($email))
            ->exists();
    }

    /**
     * Store an employee
     */
    public function store(array $data)
    {
        if (array_key_exists('email', $data)) {
            $data['email'] = strtolower($data['email']);
        }

        $this->employee
            ->create($data);
    }
}
