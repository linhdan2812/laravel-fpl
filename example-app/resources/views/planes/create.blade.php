@extends('welcome')
@section('content')
    <h1>create planes</h1>
    <form enctype="multipart/form-data" method="POST" action="{{ route('postCreatePlane') }}">
        @csrf
        <div>
            <label>name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>brand</label>
            <select name="brand_id" class="form-control">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
