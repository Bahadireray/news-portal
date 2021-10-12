@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">News</h1>
        <div class="text-end my-sm-2">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary ">Create new</a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Created_at</th>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ \App\Models\News::getTypeName($d->type) }}</td>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>
                                <a href="{{ route('news.detail', ['id' => $d->id]) }}" class="btn btn-sm btn-primary">edit</a>
                                <a href="{{ route('news.delete', ['id' => $d->id]) }}" class="btn btn-sm btn-danger" onclick="if (!confirm('Are you sure for deleting news?')) return false;">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
