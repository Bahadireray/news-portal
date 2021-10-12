@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category @if(!$model->exists) Create @else Edit: {{ $model->name }} @endif</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post">
                    @if($model->exists)
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" value="{{ $model->id  }}" disabled>
                        <label>#ID</label>
                    </div>
                    @endif

                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputCategory" type="text" placeholder="Test Category" name="name" value="{{ old('name', $model->name) }}"/>
                        <label for="inputCategory">Name</label>
                    </div>


                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="{{$model->exists ? 'Update' : 'Create'}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
