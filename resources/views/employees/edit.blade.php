@extends('layouts.template')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Employee
                    </div>
                    <div class="float-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.update',$employee->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{$employee->nom }}">
                                @error('nom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $employee->prenom }}">
                                @error('prenom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{$employee->photo }}">
                                @error('photo')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $employee->email }}">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="sexe" class="form-label">Sexe</label>
                                <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe">
                                    <option>...</option>
                                    <option value="M" {{ $employee->sexe == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ $employee->sexe == 'F' ? 'selected' : '' }}>Feminin</option>
                                </select>
                                @error('sexe')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ $employee->adresse }}">
                                @error('adresse')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $employee->phone }}">
                                @error('telephone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="datenaiss" class="form-label">Date Naisance</label>
                                <input type="date" class="form-control @error('datenaiss') is-invalid @enderror" id="datenaiss" name="datenaiss" value="{{ $employee->datenaiss }}">
                                @error('datenaiss')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="lieunaiss" class="form-label">Lieu Naisance</label>
                                <input type="text" class="form-control @error('lieunaiss') is-invalid @enderror" id="lieunaiss" name="lieunaiss" value="{{ $employee->lieunaiss }}">
                                @error('lieunaiss')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="CIN" class="form-label">CIN</label>
                                <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN" name="CIN" value="{{ $employee->CIN }}">
                                @error('CIN')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="situation_matrimoniale" class="form-label">Situation Matrimoniale</label>
                                <input type="text" class="form-control @error('situation_matrimoniale') is-invalid @enderror" id="situation_matrimoniale" name="situation_matrimoniale" value="{{ $employee->situation_matrimoniale }}">
                                @error('situation_matrimoniale')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nbrEnfants" class="form-label">Nombre d'Enfants</label>
                                <input type="number" class="form-control @error('nbrEnfants') is-invalid @enderror" id="nbrEnfants" name="nbrEnfants" value="{{ $employee->nbrEnfants }}">
                                @error('nbrEnfants')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nationalite" class="form-label">Nationalite</label>
                                <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" name="nationalite" value="{{ $employee->nationalite }}">
                                @error('nationalite')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="dateembauche" class="form-label">Date Embauche</label>
                                <input type="date" class="form-control @error('dateembauche') is-invalid @enderror" id="dateembauche" name="dateembauche" value="{{ $employee->dateembauche }}">
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
                                    <option value="Stagiaire" {{$employee->type == 'Stagiaire' ? 'selected' : '' }}>Stagiaire</option>
                                    <option value="Sous Contrat" {{ $employee->type == 'Sous Contrat' ? 'selected' : '' }}>Sous Contrat</option>
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
                                        <option value="{{$poste->id}}" {{$employee->poste_id == $poste->id ? 'selected' : '' }}>{{$poste->nom}}</option>
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
                                    <option value="Not team">Not team</option>
                                    @foreach(\App\Models\Departement::all() as $dept)
                                        <option value="{{$dept->id}}" {{ $employee->dept_id == $dept->id ? 'selected' : '' }}>{{$dept->nom}}</option>
                                    @endforeach
                                </select>
                                @error('team_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary form-control" value=" Update Employee">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

