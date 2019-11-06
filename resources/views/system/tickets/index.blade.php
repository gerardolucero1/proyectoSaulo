@extends('layouts.app')

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (count($errors))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="container">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Lista de tickets</div>
                            <div class="col-6 text-right">
                                <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-info">Crear</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <th scope="row">{{ $ticket->id }}</th>
                                        <td>{{ $ticket->employee->name }}</td>
                                        <td>{{ $ticket->employee->company->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->toFormattedDateString() }}</td>
                                        <td>
                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('¿Realmente quieres eliminar este registro?')" class="btn btn-sm btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-info">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
@endsection