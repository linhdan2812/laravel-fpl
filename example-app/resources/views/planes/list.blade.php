@extends('welcome')
@section('content')
    <h1>List planes</h1>

    <a href="{{ route('getCreatePlane') }}"><button class="btn btn-info">Create new</button></a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>image</th>
                <th>brand</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planes as $plane)

                <tr>
                    <th>{{ $plane->id }}</th>
                    <td>{{ $plane->name }}</td>
                    <td><img src="{{ asset('uploads/' . $plane->image) }}" alt="" width="150" height="150"></td>
                    <td>{{ $plane->brand_id }}</td>

                    <td>
                        <a href="{{ route('getEditPlane', $plane->id) }}">
                            <button class="btn btn-success">sửa</button>
                        </a>
                        <a href="{{ route('deletePlane', $plane->id) }}">
                            <button class="btn btn-danger">xoá</button>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
