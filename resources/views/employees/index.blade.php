@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Employees List
                    </div>
                    @if (session('store'))
                        <alert class="alert alert-success"> {{session('store')}} </alert>
                    @endif
                    @if (session('update'))
                        <alert class="alert alert-secondary"> {{session('update')}} </alert>
                    @endif
                    @if (session('delete'))
                        <alert class="alert alert-danger"> {{session('delete')}} </alert>
                    @endif
                    <div class="float-end">
                        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm">Add New Employee</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($employees->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee->id }}</th>
                                    <td>{{ $employee->nom }} </td>
                                    <td>{{ $employee->prenom }} </td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No employees found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
