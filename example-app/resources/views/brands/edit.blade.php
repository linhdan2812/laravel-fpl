@extends('welcome')
@section('content')
    <h1>edit brand</h1>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($brands as $brand)
            <div>
                <label>name</label>
                <input type="text" name="name" value="{{ $brand->name }}" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>address</label>
                <input type="text" name="address" value="{{ $brand->address }}" class="form-control">
            </div>
            <div>
                <label>image</label>
                <input type="file" name="image" class="form-control mb-4">
                <img src="{{ asset('uploads/' . $brand->image) }}" alt="" width="150" height="150" class="rounded-circle">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
