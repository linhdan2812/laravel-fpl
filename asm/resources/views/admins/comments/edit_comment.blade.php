@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="p-3 mb-2 ">

    </div>
    <div>
        @foreach($cmt as $cmt)
        <form action="{{route('admin.cmt.postEdit',$cmt->id )}}" method="post">
            @csrf
            <h6>Comment from <b>{{$cmt->username}}</b> for product <b>{{$cmt->prod_name}}</b></h6>
            <p>{{$cmt->content}}</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0"
                    {{  ($cmt->status == 0 ? ' checked' : '') }}>
                <label class="form-check-label" for="inlineRadio1">Not Approved</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1"
                    {{  ($cmt->status == 1 ? ' checked' : '') }}>
                <label class="form-check-label" for="inlineRadio2">Approved</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">confirm</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection