@extends('admins.dashboard')
@section('content')

    <form action="{{ route('admin.brand.postEdit', $brands->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name of Brand</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name"
                value="{{ $brands->brand_name }}">
            @error('cate_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
