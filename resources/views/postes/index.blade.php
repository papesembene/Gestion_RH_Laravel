@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Manage Postes</div>
        <div class="card-body">
            @can('create-user')
                <a href="{{ route('postes.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Poste</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($postes as $poste)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $poste->nom }}</td>
                        <td>
                            <form action="{{ route('postes.destroy', $poste->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('postes.show', $poste->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    @can('edit-poste')
                                        <a href="{{ route('postes.edit', $poste->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    @endcan
                                    @can('delete-poste')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this poste?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endcan


                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Postes Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $postes->links() }}

        </div>
    </div>

@endsection
