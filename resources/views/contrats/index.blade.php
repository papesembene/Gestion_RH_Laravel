@extends('layouts.template')
@section('content')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Contracts List</div>
            <div class="card-body">
                <a href="{{ route('contrats.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Contract</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Type Contrats</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Gestionnaire'))
                            <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Gestionnaire'))
                        @foreach($contrats as $con)
                            <tr>
                                <td>{{$con->id}}</td>
                                <td>{{$con->employee->prenom}} {{$con->employee->nom}} </td>
                                <td>{{$con->typeContrat->nom}}</td>
                                <td>{{$con->datedebut}}</td>
                                <td>{{$con->datefin}}</td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                        @can('edit-contrat')
                                            <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan
                                        @can('delete-contrat')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this ?');"><i class="bi bi-trash"></i> Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else @if(Auth::user()->hasRole('User Interne'))
                        @foreach($contrats as $con)
                            <tr>
                                <td>{{$con->id}}</td>
                                <td>{{$con->employee->prenom}} {{$con->employee->nom}} </td>
                                <td>{{$con->typeContrat->nom}}</td>
                                <td>{{$con->datedebut}}</td>
                                <td>{{$con->datefin}}</td>
                                <td>{{$con->status}}</td>
                            </tr>
                        @endforeach
                    @endif
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


