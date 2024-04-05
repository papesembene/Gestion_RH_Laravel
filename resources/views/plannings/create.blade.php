@extends('layouts.template')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Plannings
                    </div>
                    <div class="float-end">
                        <a href="{{ route('plannings.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="poste_id" class="form-label">Employee</label>
                            <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id">
                                <option>...</option>
                                @foreach(\App\Models\Employee::all() as $emp)
                                    <option value="{{$emp->id}}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>  {{$emp->prenom}} {{$emp->nom}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="poste_id" class="form-label">Team</label>
                            <select class="form-control @error('team_id') is-invalid @enderror" id="team_id" name="team_id">
                                <option>...</option>
                                @foreach(\App\Models\Departement::all() as $dept)
                                    <option value="{{$dept->id}}" {{ old('team_id') == $dept->id ? 'selected' : '' }}>  {{$dept->nom}}</option>
                                @endforeach
                            </select>
                            @error('team_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Date Debut</label>
                                <input type="date" class="form-control @error('datedebut') is-invalid @enderror" id="datedebut" name="datedebut" value="{{ old('datedebut') }}">
                                @error('datedebut')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Date Fin</label>
                                <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ old('datefin') }}">
                                @error('datefin')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="start_time" class="form-label">start_time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}">
                                @error('start_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="end_time" class="form-label">end_time</label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}">
                                @error('end_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="sexe" class="form-label">Planning</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    <option>...</option>
                                    <option value="Réunion" {{ old('type') == 'Réunion' ? 'selected' : '' }}>Réunion</option>
                                    <option value="Formation" {{ old('type') == 'Formation' ? 'selected' : '' }}>Formation</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label">Taches</label>
                                <input type="text" class="form-control @error('taches') is-invalid @enderror" id="taches" name="taches" value="{{ old('taches') }}">
                                @error('taches')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary form-control" value="Add Planning">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
