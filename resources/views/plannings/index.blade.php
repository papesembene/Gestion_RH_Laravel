@extends('layouts.template')
@section('content')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Plannings List</div>
            <div class="card-body">
                <a href="{{ route('plannings.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Planning</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Team</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Heure Debut</th>
                        <th>Heure Fin</th>
                        <th>Type</th>
                        <th>Taches</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($planning as $plan)
                            <tr>
                                <td>{{$plan->id}}</td>
                                <td>{{$plan->employee_id}}  </td>
                                <td>{{$plan->team_id}}  </td>
                                <td>{{$plan->datedebut}}  </td>
                                <td>{{$plan->datefin}}  </td>
                                <td>{{$plan->start_time}}  </td>
                                <td>{{$plan->end_time}}  </td>
                                <td>{{$plan->type}}  </td>
                                <td>{{$plan->tache}}  </td>
                                <td>{{$plan->status}}  </td>
                                <td>
                                    @if($plan->status == 'En attente' )
                                        <a href="{{ route('plannings.show', $plan->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('plannings.edit', $plan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('plannings.destroy', $plan->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ?')">Delete</button>
                                        </form>
                                        @endif
                                     </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

