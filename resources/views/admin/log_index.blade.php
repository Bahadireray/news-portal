@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Systen Logs</h1>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Level</th>
                        <th>Level</th>
                        <th>Level Name</th>
                        <th>Ip</th>
                        <th>Created_at</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->message }}</td>
                                <td>{{ $d->level }}</td>
                                <td>{{ $d->level_name }}</td>
                                <td>{{ $d->remote_addr }}</td>
                                <td>{{ $d->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
