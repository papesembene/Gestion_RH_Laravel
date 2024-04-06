@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Contract
                    </div>
                    <div class="float-end">
                        <a href="{{ route('contrats.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('contrats.store')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end text-start">Employee</label>
                            <div class="col-md-6">
                                <select name="employee_id" id="employeeSelect" class="form-control">
                                    <option value="">---choose Employee---</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}}">{{$emp->prenom}} {{$emp->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end text-start">Type Contrat</label>
                            <div class="col-md-6">
                                <select name="type_id" id="" class="form-control">
                                    <option value="">---choose Type---</option>
                                    @foreach(\App\Models\TypeContrat::all() as $type)
                                        <option value="{{$type->id}}">{{$type->nom}} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_id'))
                                    <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Date Debut</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('datedebut') is-invalid @enderror" id="datedebut" name="datedebut" value="{{ old('datedebut') }}">
                                @if ($errors->has('datedebut'))
                                    <span class="text-danger">{{ $errors->first('datedebut')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="datefin" class="col-md-4 col-form-label text-md-end text-start">Date Fin</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ old('datefin') }}">
                                @if ($errors->has('datefin'))
                                    <span class="text-danger">{{ $errors->first('datefin')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-4 col-form-label text-md-end text-start">Statut</label>
                            <div class="col-md-6">
                                <select name="status" id="" class="form-control">
                                        <option value="Active">Active </option>
                                        <option value="Inactive">Inactive </option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Contract">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


