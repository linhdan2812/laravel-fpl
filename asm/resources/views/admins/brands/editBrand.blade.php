@extends('admins.dashboard')
@section('content')

    <form action="{{ route('admin.cate.postEdit', $cate->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name of Category</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cate_name" value="{{ $cate->cate_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
