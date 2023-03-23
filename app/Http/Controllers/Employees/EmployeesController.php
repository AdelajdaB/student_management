<?php

namespace App\Http\Controllers\Employees;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show employees list
        $comps = Company::all();
        return view('employees.index', ['employees' => Employee::latest()->paginate(10)])->with('comps', $comps);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create new Employee Profile
        $comps = Company::all();
        return view('employees.create')->with('comps', $comps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //Store Employee Profile
        $employee = Employee::create($request->only('firstname', 'lastname', 'company_id', 'email', 'phone'));

        return redirect()->route('employees.dashboard')->with('success', 'Successfully created a New Employee Profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //Edit Employee Profile
        $comps = Company::all();
        return view('employees.edit', compact('employee'))->with('comps', $comps);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //Update Employee Profile
        $employee->update($request->validated());
        return back()->with('success', 'Successfully updated Company profile');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //Delete Employee Profile
        $employee->delete();

        return redirect()->route('employees.dashboard')->with('success', 'Successfully deleted profile and all assets related to them.');
    }
}
