@extends('layouts.app')

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
                            <label for="prenom" class="col-md-4 col-form-label text-md-end text-start">Prenom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="nom" name="prenom" value="{{ old('prenom') }}">
                                @if ($errors->has('prenom'))
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="sexe" class="col-md-4 col-form-label text-md-end text-start">Sexe</label>
                            <div class="col-md-6">
                                <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe">
                                    <option>...</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Feminin</option>
                                </select>
                                @if ($errors->has('sexe'))
                                    <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end text-start">Adresse</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
                                @if ($errors->has('adresse'))
                                    <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end text-start">Phone</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="" name="phone" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="datenaiss" class="col-md-4 col-form-label text-md-end text-start">Date Naisance</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('datenaiss') is-invalid @enderror" id="datenaiss" name="datenaiss" value="{{ old('datenaiss') }}">
                                @if ($errors->has('datenaiss'))
                                    <span class="text-danger">{{ $errors->first('datenaiss') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lieunaiss" class="col-md-4 col-form-label text-md-end text-start">Lieu Naisance</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('lieunaiss') is-invalid @enderror" id="lieunaiss" name="lieunaiss" value="{{ old('lieunaiss') }}">
                                @if ($errors->has('lieunaiss'))
                                    <span class="text-danger">{{ $errors->first('lieunaiss') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="CIN" class="col-md-4 col-form-label text-md-end text-start">CIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN" name="CIN" value="{{ old('CIN') }}">
                                @if ($errors->has('CIN'))
                                    <span class="text-danger">{{ $errors->first('CIN') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="situation matrimoniale" class="col-md-4 col-form-label text-md-end text-start">Situation Matrimoiale</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('situation matrimoniale') is-invalid @enderror" id="situation matrimoniale" name="situation matrimoniale" value="{{ old('situation matrimoniale') }}">
                                @if ($errors->has('situation matrimoniale'))
                                    <span class="text-danger">{{ $errors->first('situation matrimoniale') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nbrEnfants" class="col-md-4 col-form-label text-md-end text-start">nombre d'Enfants</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('nbrEnfants') is-invalid @enderror" id="nbrEnfants" name="nbrEnfants" value="{{ old('nbrEnfants') }}">
                                @if ($errors->has('nbrEnfants'))
                                    <span class="text-danger">{{ $errors->first('nbrEnfants') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nationalite" class="col-md-4 col-form-label text-md-end text-start">Nationalite</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" name="nationalite" value="{{ old('nationalite') }}">
                                @if ($errors->has('nationalite'))
                                    <span class="text-danger">{{ $errors->first('nationalite') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="dateembauche" class="col-md-4 col-form-label text-md-end text-start">Date Embauche</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('dateembauche') is-invalid @enderror" id="dateembauche" name="dateembauche" value="{{ old('dateembauche') }}">
                                @if ($errors->has('dateembauche'))
                                    <span class="text-danger">{{ $errors->first('dateembauche') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type" class="col-md-4 col-form-label text-md-end text-start">Type</label>
                            <div class="col-md-6">
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    <option>...</option>
                                    <option value="Stagiaire">Stagiaire</option>
                                    <option value="Sous Contrat">Sous Contrat</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="poste_id" class="col-md-4 col-form-label text-md-end text-start">Poste</label>
                            <div class="col-md-6">
                                @foreach(\App\Models\Poste::all() as $poste)
                                    <select class="form-control @error('poste_id') is-invalid @enderror" id="poste_id" name="poste_id">
                                        <option>...</option>
                                        <option value="{{$poste->id}}">{{$poste->nom}}</option>
                                    </select>
                                @endforeach
                                @if ($errors->has('poste_id'))
                                    <span class="text-danger">{{ $errors->first('poste_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="dept_id" class="col-md-4 col-form-label text-md-end text-start">Departement</label>
                            <div class="col-md-6">
                                @foreach(\App\Models\Departement::all() as $dept)
                                    <select class="form-control @error('dept_id') is-invalid @enderror" id="dept_id" name="dept_id">
                                        <option>...</option>
                                        <option value="{{$dept->id}}">{{$dept->nom}}</option>
                                    </select>
                                @endforeach
                                @if ($errors->has('dept_id'))
                                    <span class="text-danger">{{ $errors->first('dept_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Profile</label>
                            <div class="col-md-6">
                                <select class="form-select @error('roles') is-invalid @enderror"  aria-label="Roles" id="roles" name="roles[]">
                                    @forelse ($roles as $role)

                                        @if ($role!='Super Admin')
                                            <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>

                                        @endif

                                    @empty

                                    @endforelse
                                </select>
                                @if ($errors->has('roles'))
                                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                                @endif
                            </div>
                        </div>





                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Employee">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
