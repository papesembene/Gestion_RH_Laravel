@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Departement Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('depts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dept->nom}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Chef:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $dept->chef}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



