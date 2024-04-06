@extends('layouts.template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New User
                    </div>
                    <div class="float-end">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end text-start">Employee</label>
                            <div class="col-md-6">
                                <select name="employee_id" id="employeeSelect" class="form-control">
                                    <option value="">---choose Employee---</option>
                                    @foreach(\App\Models\Employee::all() as $emp)
                                        <option value="{{$emp->id}}">{{$emp->prenom}} {{$emp->nom}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Full Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control " id="name" name="name"  readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control " id="email" name="email" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
                            <div class="col-md-6">
                                <select class="form-select @error('roles') is-invalid @enderror"  aria-label="Roles" id="roles" name="roles[]">
                                    @forelse ($roles as $role)

                                        @if ($role!='Super Admin')
                                            <option value="{{ $role }}" {{in_array($role, old('roles') ?? []) ? 'selected' : ''}}>
                                                {{ $role }}
                                            </option>
                                        @else
                                            @if (Auth::user()->hasRole('Super Admin'))
                                                <option value="{{ $role }}" {{in_array($role, old('roles') ?? []) ? 'selected' : ''}}>
                                                    {{ $role }}
                                                </option>
                                            @endif
                                        @endif

                                    @empty

                                    @endforelse
                                </select>
                                @if ($errors->has('roles'))
                                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add User">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.getElementById('employeeSelect').addEventListener('change', function() {
            let employee = this.value;
            console.log(employee)
            axios.get(`/employee/users/${employee}`)
                .then(function(response) {
                    let employeeDetails = response.data;
                    document.getElementById('name').value = employeeDetails.prenom+' '+employeeDetails.nom ;
                    document.getElementById('email').value = employeeDetails.email;
                    //console.log(data);
                })
                .catch(function(error) {
                    console.error('Une erreur s\'est produite lors de la récupération des détails de lemployee :', error);
                });
        });
    </script>
@endsection



