@extends('layouts.template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Update Document
                    </div>
                    <div class="float-end">
                        <a href="{{ route('documents.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.update',$document->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="mb-3 row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end text-start">Employee</label>
                            <div class="col-md-6">
                                <select name="employee_id" id="" class="form-control">
                                    <option value="">---choose Employee---</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}}" {{ $document->employee_id == $emp->id ? 'selected' : '' }}>{{$emp->prenom}} {{$emp->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type" class="col-md-4 col-form-label text-md-end text-start">Nom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $document->type }}">
                                @if ($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type" class="col-md-4 col-form-label text-md-end text-start">Fichier</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('type') is-invalid @enderror" id="fichier" name="fichier" value="{{$document->fichier }}">
                                @if ($errors->has('fichier'))
                                    <span class="text-danger">{{ $errors->first('fichier') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Document">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


