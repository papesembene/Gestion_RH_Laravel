@extends('layouts.template')
@section('content')
    @if(auth()->user()->hasRole('Super Admin'))
    <!-- Inclure Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card-height {
            height: 100%; /* Hauteur de la carte */
        }
    </style>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card card-height">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Nombre Total d'Employés</h5>
                    <p class="card-text">{{$totalAgents}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-height">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user"></i> Nombre Total d'Utilisateurs</h5>
                    <p class="card-text">{{$totalUsers}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-height">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tasks"></i> Fonctions des Utilisateurs</h5>
                    <ul class="list-group">
                        @foreach($userFunctions as $function)
                            <li class="list-group-item">{{$function}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Répartition des Contrats par Type</h5>
                    <canvas id="chartType"></canvas>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('chartType').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['CDD', 'CDI'],
                datasets: [{
                    label: 'Nombre de Contrats',
                    data: [{{$cddAgents}}, {{$cdiAgents}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Rouge pour CDD
                        'rgba(54, 162, 235, 0.6)', // Bleu pour CDI
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Répartition des Contrats par Type',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
    @endif
@endsection
