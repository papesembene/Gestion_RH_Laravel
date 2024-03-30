@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Demande Conges
                    </div>
                    <div class="float-end">
                        <a href="{{ route('conges.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('conges.store')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Date Debut</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('datedebut') is-invalid @enderror" id="datedebut" name="datedebut" value="{{ old('datedebut') }}">
                                @if ($errors->has('datedebut'))
                                    <span class="text-danger">{{ $errors->first('datedebut')}}</span>
                                @endif
                            </div>
                        </div>
                        <input type="text"  name="employee_id" value="{{Auth::user()->employee_id}}">
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Date Fin</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ old('datefin') }}">
                                @if ($errors->has('datefin'))
                                    <span class="text-danger">{{ $errors->first('datefin') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="raison" class="col-md-4 col-form-label text-md-end text-start">Raisons</label>
                            <div class="col-md-6">
                                <textarea cols="7" rows="6" class="form-control" name="leave_reason"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type_id" class="col-md-4 col-form-label text-md-end text-start">Type de Conges</label>
                            <div class="col-md-6">
                                <select class="form-control @error('type_conges_id') is-invalid @enderror" id="type_conges_id" name="type_conges_id">
                                    <option>...</option>
                                    @foreach(\App\Models\TypeConges::all() as $type)
                                        <option value="{{$type->id}}">{{$type->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_conges_id'))
                                    <span class="text-danger">{{ $errors->first('type_conges_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Validate Leave">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


