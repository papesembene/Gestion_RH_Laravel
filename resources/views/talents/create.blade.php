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
                            <label for="nom" class="col-md-4 col-form-label text-md-end text-start">Nom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="competence" class="col-md-4 col-form-label text-md-end text-start">Talent</label>
                            <div class="col-md-6">
                                <select class="form-control @error('type_talent') is-invalid @enderror" id="type_talent" name="type_talent">
                                    <option value="">Sélectionner le type de talent</option>
                                    <option value="Talent 1" {{ old('type_talent') == 'Talent 1' ? 'selected' : '' }}>Talent 1</option>
                                    <option value="Talent 2" {{ old('type_talent') == 'Talent 2' ? 'selected' : '' }}>Talent 2</option>
                                    <option value="Talent 3" {{ old('type_talent') == 'Talent 3' ? 'selected' : '' }}>Talent 3</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                                @error('type_talent')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($errors->has('type_talent'))
                                    <span class="text-danger">{{ $errors->first('type_talent') }}</span>
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

