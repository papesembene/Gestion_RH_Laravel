@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Liste des Plannings</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <a href="{{ route('plannings.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter un Planning
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Plannings d'équipe</h5>
                                        @foreach($planning as $plan)
                                            @if($plan->team_id && $plan->team)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Planning #{{ $plan->id }}</h5>
                                                        <p class="card-text">Équipe: {{ $plan->team->nom }}</p>
                                                        <p class="card-text">Date de Début: {{ date('d/m/Y', strtotime($plan->datedebut)) }}</p>
                                                        <p class="card-text">Date de Fin: {{ date('d/m/Y', strtotime($plan->datefin)) }}</p>
                                                        <p class="card-text">Type: {{ $plan->type }}</p>
                                                        <p class="card-text">Tâches: {{ $plan->taches }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a href="{{ route('plannings.show', $plan->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i> Voir
                                                                </a>
                                                                <a href="{{ route('plannings.edit', $plan->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-edit"></i> Modifier
                                                                </a>
                                                            </div>
                                                            <form action="{{ route('plannings.destroy', $plan->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce planning ?')">
                                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Plannings individuels</h5>
                                        @foreach($planning as $plan)
                                            @if($plan->employee_id && $plan->employee)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Planning #{{ $plan->id }}</h5>
                                                        <p class="card-text">Employé: {{ $plan->employee->prenom }} {{ $plan->employee->nom }}</p>
                                                        <p class="card-text">Date de Début: {{ date('d/m/Y', strtotime($plan->datedebut)) }}</p>
                                                        <p class="card-text">Date de Fin: {{ date('d/m/Y', strtotime($plan->datefin)) }}</p>
                                                        <p class="card-text">Type: {{ $plan->type }}</p>
                                                        <p class="card-text">Tâches: {{ $plan->taches }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a href="{{ route('plannings.show', $plan->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-eye"></i> Voir
                                                                </a>
                                                                <a href="{{ route('plannings.edit', $plan->id) }}" class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-edit"></i> Modifier
                                                                </a>
                                                            </div>
                                                            <form action="{{ route('plannings.destroy', $plan->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce planning ?')">
                                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
