@extends('admins.dashboard')

@section('content')

<form action="{{route('admin.cate.postCreate')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name of Category</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="cate_name">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection