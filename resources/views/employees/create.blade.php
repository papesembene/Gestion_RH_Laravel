@extends('layouts.template')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Employee
                    </div>
                    <div class="float-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                                @error('nom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}">
                                @error('prenom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="sexe" class="form-label">Sexe</label>
                                <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe">
                                    <option>...</option>
                                    <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Feminin</option>
                                </select>
                                @error('sexe')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
                                @error('adresse')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="datenaiss" class="form-label">Date Naisance</label>
                                <input type="date" class="form-control @error('datenaiss') is-invalid @enderror" id="datenaiss" name="datenaiss" value="{{ old('datenaiss') }}">
                                @error('datenaiss')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="lieunaiss" class="form-label">Lieu Naisance</label>
                                <input type="text" class="form-control @error('lieunaiss') is-invalid @enderror" id="lieunaiss" name="lieunaiss" value="{{ old('lieunaiss') }}">
                                @error('lieunaiss')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="CIN" class="form-label">CIN</label>
                                <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN" name="CIN" value="{{ old('CIN') }}">
                                @error('CIN')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situation_matrimoniale" class="form-label">Situation Matrimoniale</label>
                                <input type="text" class="form-control @error('situation_matrimoniale') is-invalid @enderror" id="situation_matrimoniale" name="situation_matrimoniale" value="{{ old('situation_matrimoniale') }}">
                                @error('situation_matrimoniale')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nbrEnfants" class="form-label">Nombre d'Enfants</label>
                                <input type="number" class="form-control @error('nbrEnfants') is-invalid @enderror" id="nbrEnfants" name="nbrEnfants" value="{{ old('nbrEnfants') }}">
                                @error('nbrEnfants')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nationalite" class="form-label">Nationalite</label>
                                <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" name="nationalite" value="{{ old('nationalite') }}">
                                @error('nationalite')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="dateembauche" class="form-label">Date Embauche</label>
                                <input type="date" class="form-control @error('dateembauche') is-invalid @enderror" id="dateembauche" name="dateembauche" value="{{ old('dateembauche') }}">
                                @error('dateembauche')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    <option>...</option>
                                    <option value="Stagiaire">Stagiaire</option>
                                    <option value="Sous Contrat">Sous Contrat</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="poste_id" class="form-label">Poste</label>
                                <select class="form-control @error('poste_id') is-invalid @enderror" id="poste_id" name="poste_id">
                                    <option>...</option>
                                    @foreach(\App\Models\Poste::all() as $poste)
                                        <option value="{{$poste->id}}">{{$poste->nom}}</option>
                                    @endforeach
                                </select>
                                @error('poste_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="team_id" class="form-label">Team</label>
                                <select class="form-control @error('team_id') is-invalid @enderror" id="team_id" name="team_id">
                                    <option>Not team</option>
                                    @foreach(\App\Models\Departement::all() as $dept)
                                        <option value="{{$dept->id}}">{{$dept->nom}}</option>
                                    @endforeach
                                </select>
                                @error('team_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary form-control" value="Add Employee">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
