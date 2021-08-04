@extends('welcome')
@section('content')
    <h1>creat brand</h1>
    <form enctype="multipart/form-data" method="POST" action="{{ route('postCreateBrand') }}">
        @csrf

        <div>
            <label>name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div>
            <label>address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div>
            <label>image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
