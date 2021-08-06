@extends('welcome')
@section('content')
    <h1>create planes</h1>
    <form enctype="multipart/form-data" method="POST" action="">
        @csrf
        @foreach ($planes as $p)
            <div>
                <label>name</label>
                <input type="text" name="name" class="form-control" value="{{ $p->name }}">
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
                <img src="{{ asset('uploads/' . $p->image) }}" alt="" width="150" height="150"
                    class="rounded-circle mt-3">
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
