@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="p-3 mb-2 ">
        <h6>Comment from ... for product...</h6>
        <p>{{$getCmt->content}}</p>
    </div>
    <div>
        <form action="{{route('admin.cmt.postEdit',$getCmt->id )}}" method="post">
            @csrf

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0"
                    {{  ($getCmt->status == 0 ? ' checked' : '') }}>
                <label class="form-check-label" for="inlineRadio1">Not Approved</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1"
                    {{  ($getCmt->status == 1 ? ' checked' : '') }}>
                <label class="form-check-label" for="inlineRadio2">Approved</label>
            </div>
            <button type="submit" class="btn btn-primary">confirm</button>
        </form>
    </div>
</div>
@endsection