@extends('base')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">News @if(!$model->exists) Create @else Edit: {{ $model->name }} @endif</h1>

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
                        <select name="type" class="form-control">
                            @foreach (\App\Models\News::getTypeOptions() as $key => $item)
                                <option value="{{ $key }}" {{ ( $key == $model->type) ? 'selected' : '' }}> {{ $item }} </option>
                            @endforeach
                        </select>

                        <label for="inputType">Type</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputTitle" type="text" placeholder="Sample title" name="title" value="{{ old('title', $model->title) }}"/>
                        <label for="inputTitle">Title</label>
                    </div>


                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="content" id="" cols="30" rows="10" style="height: 150px">{{ old('content', $model->content) }}</textarea>
                        <label for="inputContent">Content</label>
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
