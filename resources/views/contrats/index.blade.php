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
                        <th>Status</th>
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
                                <td>{{$con->status}}</td>
                                <td>
                                    @if($con->status == 'Waiting' )
                                        <a href="{{ route('contrat.accept', $con->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                        <a href="{{ route('contrat.refuse', $con->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                    @endif
                                    <a href="{{ route('contrat.accept', $con->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                    <a href="{{ route('contrat.refuse', $con->id) }}" class="btn btn-danger btn-sm">Refuser</a>
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


