@extends('welcome')
@section('content')
    <h1>List planes</h1>
    @if (Auth::check() == true)
        <a href="{{ route('getCreatePlane') }}"><button class="btn btn-info">Create new</button></a>
    @else
        <button class="btn btn-info disable" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create new</button>
    @endif
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

                        @if (Auth::check() == true)
                            <a href="{{ route('getEditPlane', $plane->id) }}">
                                <button class="btn btn-success">sửa</button>
                            </a>
                            <a href="{{ route('deletePlane', $plane->id) }}">
                                <button class="btn btn-danger">xoá</button>
                            </a>
                        @else
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                xoá
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                sửa
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Bạn thân iu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Không làm gì được đâu, đừng cố, muốn thì đăng nhập, mà không có tài khoản thì
                                            lập
                                            đi rồi thích làm gì thì làm :)))
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
