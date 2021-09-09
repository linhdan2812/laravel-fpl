@extends('admins.dashboard')
@section('content')
    @foreach ($prod as $p)
        <div class="container">
            <div class="p-3 mb-2">
                <img src="{{ asset('uploads/' . $p->image) }}" alt="" width="150" height="150"
                    class=" rounded float-start mx-auto d-block rounded-circle">
            </div>
            <div class="p-3 ml-5 ">
                <div class="ml-5">
                    <h4 class="text-danger">{{ $p->prod_name }}</h4>
                    <h5>price: {{ $p->price }}</h5>
                    <p style="display:inline-block">{{ $p->detail }}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection
