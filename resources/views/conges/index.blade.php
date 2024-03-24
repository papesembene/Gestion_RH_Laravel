@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Leaves List
                    </div>
                    <div class="float-end">
                        <a href="{{ route('conges.create') }}" class="btn btn-success btn-sm">Add Conges</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($conges->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date Debut</th>
                                <th scope="col">Date Fin</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($conges as $conge)
                                <tr>
                                    <th scope="row">{{ $conge->id }}</th>
                                    <td>{{$conge->employee->nom}} {{$conge->employee->prenom}}</td>
                                    <td>{{ $conge->datedebut }}</td>
                                    <td>{{ $conge->datefin }}</td>
                                    <td>
                                        <a href="{{ route('conges.show', $conge->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Leaves found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

