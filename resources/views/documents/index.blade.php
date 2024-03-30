@extends('layouts.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Documents List
                    </div>
                    @if (session('store'))
                        <alert class="alert alert-success"> {{session('store')}} </alert>
                    @endif
                    @if (session('update'))
                        <alert class="alert alert-secondary"> {{session('update')}} </alert>
                    @endif
                    @if (session('delete'))
                        <alert class="alert alert-danger"> {{session('delete')}} </alert>
                    @endif
                    <div class="float-end">
                        <a href="{{ route('documents.create') }}" class="btn btn-success btn-sm">Add New Document</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($documents->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Employee</th>
                                <th scope="col">Document</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($documents as $doc)
                                <tr>
                                    <th scope="row">{{ $doc->id }}</th>
                                    <td> {{ $doc->employee->prenom }} {{ $doc->employee->nom }} </td>
                                    <td>{{ $doc->type }} </td>
                                    <td>
                                        <a href="{{ route('documents.show', $doc->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('documents.edit', $doc->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doument?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Documenys found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
