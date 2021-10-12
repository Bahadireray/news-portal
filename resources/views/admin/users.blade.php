@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Users</h1>

        <div class="card mb-4">

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Kullanıcı Tipi</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>E-posta</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.detail', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">edit</a>
                                    <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger" onclick="if (!confirm('Are you sure for deleting user?')) return false;">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
