@extends('layouts.template')
@section('content')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Abscences List</div>
            <div class="card-body">
                <a href="{{ route('abscences.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Abscences</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Motif</th>
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
                        @foreach($abs as $ab)
                            <tr>
                                <td>{{$ab->id}}</td>
                                <td>{{$ab->employee->prenom}} {{$ab->employee->nom}}</td>
                                <td>{{$ab->motif}}</td>
                                <td>{{$ab->datedebut}}</td>
                                <td>{{$ab->datefin}}</td>
                                <td>{{$ab->status}}</td>
                                <td>
                                    @if($ab->status == 'En Attente' )
                                        <a href="{{ route('abscences.accept', $ab->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                        <a href="{{ route('abscences.refuse', $ab->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                    @else
                                    <a href="{{ route('abscences.accept', $ab->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                    <a href="{{ route('abscences.refuse', $ab->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                    @endif
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    @else @if(Auth::user()->hasRole('User Interne'))
                        @foreach($abs as $ab)
                            <tr>
                                <td>{{$ab->id}}</td>
                                <td>{{$ab->employee->prenom}} {{$ab->employee->nom}}</td>
                                <td>{{$ab->motif}}</td>
                                <td>{{$ab->datedebut}}</td>
                                <td>{{$ab->datefin}}</td>
                                <td>{{$ab->status}}</td>

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

