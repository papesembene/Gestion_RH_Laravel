@extends('layouts.template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Employee Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Photo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <img src="{{asset('/storage/images/'.$employee->photo)}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Full Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->prenom}}   {{ $employee->nom}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Team:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{$employee->departement? $employee->departement->nom: 'Not Team'}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->email}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Phone:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                              {{ $employee->phone}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Adresse:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->adresse}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Talents:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @foreach ($employee->talents as $talent)
                                {{ $talent->nom }},
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



