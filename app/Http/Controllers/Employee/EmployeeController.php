<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return $this->success(($employees), __('Employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return $this->success(new EmployeeResource($employee), __('model.created', ['model' => 'Employee']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $this->success(new EmployeeResource($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if ($employee->update($request->validated()))
        {
            return $this->success(new EmployeeResource($employee), __('model.updated', ['model' => 'Employee']));
        }

        return $this->error(__('model.could_not_update', ['model' => 'Employee']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        if ($employee->delete())
        {
            return $this->success(__('model.deleted', ['model' => 'Employee']));
        }
        return $this->error(__('model.could_not_delete', ['model' => 'Employee']));
    }
}
