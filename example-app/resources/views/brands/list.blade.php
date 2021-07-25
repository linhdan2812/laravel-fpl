@extends('welcome')
@section('content')
    <h1>List brands</h1>

    <a href="{{ route('getCreateBrand') }}"><button class="btn btn-info">Create new</button></a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>image</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)

                <tr>
                    <th>{{ $brand->id }}</th>
                    <td>{{ $brand->name }}</td>
                    <td><img src="{{ asset('storage/' . $brand->image) }}" alt="" width="150" height="150"></td>
                    <td>
                        <a href="{{ route('deleteBrand', $brand->id) }}">
                            <button class="btn btn-danger">xoá</button>
                        </a>
                        <a href="{{ route('getEditBrand', $brand->id) }}">
                            <button class="btn btn-success">sửa</button>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
