@extends('admins.dashboard')

@section('content')

    <form action="{{ route('admin.cate.postCreate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name of Category</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cate_name">
            @error('cate_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brands</label>
            <select id="disabledSelect" class="form-select" name="brand_id">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
