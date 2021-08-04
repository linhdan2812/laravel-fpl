@extends('admins.dashboard')

@section('content')
    <h3>Create New Brand</h3>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name of Brand</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
