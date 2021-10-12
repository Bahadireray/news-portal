@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Edit: {{ $user->email }}</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post">
                    <div class="form-floating mb-3">
                        <select name="type" class="form-control">
                            @foreach ($user->getTypeOptions() as $key => $item)
                                <option value="{{ $key }}" {{ ( $key == $user->type) ? 'selected' : '' }}> {{ $item }} </option>
                            @endforeach
                        </select>

                        <label for="inputType">User Type</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputFirstname" type="text" placeholder="John" name="first_name" value="{{ old('first_name', $user->first_name) }}"/>
                        <label for="inputFirstname">Firstname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputLastname" type="text" placeholder="Doe"  name="last_name" value="{{ old('last_name', $user->last_name) }}"/>
                        <label for="inputLastname">Lastname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" value="{{ old('email', $user->email) }}"/>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="{{$user->exists ? 'Update' : 'Create'}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
