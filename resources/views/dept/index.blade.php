@extends('layouts.template')

@section('content')

    <div class="card">
        <div class="card-header">Manage Team</div>
        <div class="card-body">
            @can('create-user')
                <a href="{{ route('depts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Team</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Leader</th>
                    <th scope="col">Supervisor</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($depts as $dept)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row">{{ $dept->nom }}</th>
                        <td>{{ $dept->leader()->nom }} {{ $dept->leader()->prenom }}</td>
                        <td>{{ $dept->supervisor()->nom}} {{ $dept->supervisor()->prenom}}</td>
                        <td>
                            <form action="{{ route('depts.destroy', $dept->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('depts.show', $dept->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                @can('edit-poste')
                                    <a href="{{ route('depts.edit', $dept->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                @endcan
                                @can('delete-poste')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this team?');"><i class="bi bi-trash"></i> Delete</button>
                                @endcan


                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Team Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $depts->links() }}

        </div>
    </div>

@endsection

