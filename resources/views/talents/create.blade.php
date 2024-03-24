@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Talent
                    </div>
                    <div class="float-end">
                        <a href="{{ route('talents.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('talents.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nom" class="col-md-4 col-form-label text-md-end text-start">Langue</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('langue') is-invalid @enderror" id="langue" name="langue" value="{{ old('langue') }}">
                                @if ($errors->has('langue'))
                                    <span class="text-danger">{{ $errors->first('langue') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="competence" class="col-md-4 col-form-label text-md-end text-start">Competence</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('competence') is-invalid @enderror" id="competence" name="competence" value="{{ old('competence') }}">
                                @if ($errors->has('competence'))
                                    <span class="text-danger">{{ $errors->first('competence') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="habilitation" class="col-md-4 col-form-label text-md-end text-start">Habilitation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('habilitation') is-invalid @enderror" id="habilitation" name="habilitation" value="{{ old('habilitation') }}">
                            @if ($errors->has('habilitation'))
                                    <span class="text-danger">{{ $errors->first('habilitation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="evaluation" class="col-md-4 col-form-label text-md-end text-start">Evaluation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('evaluation') is-invalid @enderror" id="evaluation" name="evaluation" value="{{ old('evaluation') }}">
                                @if ($errors->has('evaluation'))
                                    <span class="text-danger">{{ $errors->first('evaluation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Talent">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

