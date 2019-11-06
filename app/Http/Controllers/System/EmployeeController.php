<?php

namespace App\Http\Controllers\System;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();

        return view('system.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('system.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificamos que los datos sean correctos
        $v = \Validator::make($request->all(), [
            'name' => 'required',
            'company_id' => 'required',
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $employee = Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('info', 'Empleado creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::orderBy('name', 'ASC')->pluck('name', 'id');
        $employee = Employee::findOrFail($id);

        return view('system.employees.edit', compact('companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Verificamos que los datos sean correctos
        $v = \Validator::make($request->all(), [
            'name' => 'required',
            'company_id' => 'required',
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $employee = Employee::findOrFail($id);
        $employee->fill($request->all())->save();

        return redirect()->route('employees.index')
            ->with('info', 'Empleado editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('info', 'Empleado eliminado con exito');
    }
}
