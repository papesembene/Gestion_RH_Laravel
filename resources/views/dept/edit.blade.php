@extends('layouts.template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Poste
                    </div>
                    <div class="float-end">
                        <a href="{{ route('depts.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('depts.update', $dept->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $dept->nom}}">
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="leader_id" class="col-md-4 col-form-label text-md-end text-start">Leader</label>
                            <div class="col-md-6">
                                <select name="leader_id" id="" class="form-control">
                                    <option value="">---choose Leader---</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}}" @selected($emp->id ==$dept->leader_id )>{{$emp->prenom}} {{$emp->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('leader_id'))
                                    <span class="text-danger">{{ $errors->first('leader_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="supervisor_id" class="col-md-4 col-form-label text-md-end text-start">Supervisor</label>
                            <div class="col-md-6">
                                <select name="supervisor_id" id="" class="form-control">
                                    <option value="">---choose Leader---</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}}" @selected($emp->id ==$dept->supervisor_id )>{{$emp->prenom}} {{$emp->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('supervisor_id'))
                                    <span class="text-danger">{{ $errors->first('supervisor_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Team">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
