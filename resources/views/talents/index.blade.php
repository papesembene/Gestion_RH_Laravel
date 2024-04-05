@extends('layouts.template')

@section('content')

    <div class="card">
        <div class="card-header">Manage Talents</div>
        @if (session('store'))
            <alert class="alert alert-success"> {{session('store')}} </alert>
        @endif
        @if (session('update'))
            <alert class="alert alert-secondary"> {{session('update')}} </alert>
        @endif
        @if (session('delete'))
            <alert class="alert alert-danger"> {{session('delete')}} </alert>
        @endif
        <div class="card-body">
            @can('create-user')
                <a href="{{ route('talents.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Talent</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($talents as $talent)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $talent->nom }}</td>
                        <td>{{ $talent->type_talent }}</td>
                        <td>
                            <form action="{{ route('talents.destroy', $talent->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('talents.show', $talent->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                @can('edit-talent')
                                    <a href="{{ route('talents.edit', $talent->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                @endcan
                                @can('delete-talent')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this ?');"><i class="bi bi-trash"></i> Delete</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Talents Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $talents->links() }}

        </div>
    </div>

@endsection

