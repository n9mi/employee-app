<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\DepartementService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $departementService;

    public function __construct(
        EmployeeService $employeeService,
        DepartementService $departementService)
    {
        $this->employeeService = $employeeService;
        $this->departementService = $departementService;
    }

    public function index(Request $request)
    {
        return view('pages.employee.index', [
            'employees' => $this->employeeService->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages.employee.create', [
            'departements' => $this->departementService->findAll(),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->employeeService->store($request);
        if (array_key_exists('errors', $result)) {
            return redirect()->back()->withErrors($result['errors']);
        }

        return redirect()->route('employee')->with('success_msg', $result['success']);
    }
}
