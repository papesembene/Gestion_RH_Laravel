@extends('layouts.template')
@section('content')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Conge List</div>
            <div class="card-body">
                <a href="{{ route('conges.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Conge</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Type Conge</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Gestionnaire'))
                        @foreach($conges as $conge)
                            <tr>
                                <td>{{$conge->id}}</td>
                                <td>{{$conge->employee->prenom}} {{$conge->employee->nom}} </td>
                                <td>{{$conge->type_conges_id}}</td>
                                <td>{{$conge->datedebut}}</td>
                                <td>{{$conge->datefin}}</td>
                                <td>{{$conge->status}}</td>
                                <td>
                                    @if($conge->status == 'Waiting' )
                                       <!--  <a href="" class="btn btn-warning btn-sm">Valider</a>
                                         <a href="" class="btn btn-danger btn-sm">Refuser</a>
                                    @endif
                                </td>-->
                            </tr>
                        @endforeach
                        @else @if(Auth::user()->hasRole('User Interne'))
                            @foreach($conges as $conge)
                                <tr>
                                    <td>{{$conge->id}}</td>
                                    <td>{{$conge->employee->prenom}} {{$conge->employee->nom}}</td>
                                    <td>{{$conge->type_conges_id}}</td>
                                    <td>{{$conge->datedebut}}</td>
                                    <td>{{$conge->datefin}}</td>
                                    <td>{{$conge->status}}</td>
                                    <td>
                                        @if($conge->status != '' )
                                           
                                        @endif
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

