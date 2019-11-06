<?php

namespace App\Http\Controllers\System;

use App\User;
use App\Ticket;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'DESC')->get();

        return view('system.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::orderBy('name', 'ASC')->pluck('name', 'id');
        $engineers = User::orderBy('name', 'ASC')->pluck('name', 'id');
        $users = User::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('system.tickets.create', compact('employees', 'engineers', 'users'));
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
            'user_id' => 'required',
            'employee_id' => 'required',
            'engineer_id' => 'required',
            'activity' => 'required',
            'notes' => 'required',
            'priority' => 'required',
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $ticket = Ticket::create($request->all());

        $ultimoTicket = Ticket::orderBy('id', 'DESC')->first();
        $ultimoTicket->folio = 'BC' . $ultimoTicket->id;
        $ultimoTicket->save();

        return redirect()->route('tickets.index')
            ->with('info', 'Ticket creado con exito');
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
        $ticket = Ticket::findOrFail($id);
        $employees = Employee::orderBy('name', 'ASC')->pluck('name', 'id');
        $engineers = User::orderBy('name', 'ASC')->pluck('name', 'id');
        $users = User::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('system.tickets.edit', compact('ticket', 'employees', 'engineers', 'users'));
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
            'user_id' => 'required',
            'employee_id' => 'required',
            'engineer_id' => 'required',
            'activity' => 'required',
            'notes' => 'required',
            'priority' => 'required',
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $ticket = Ticket::findOrFail($id);
        $ticket->fill($request->all())->save();

        return redirect()->route('tickets.index')
            ->with('info', 'Ticket editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
