@extends('user.layouts.master')

@section('content')



<div class="container mt-3">

    <div class="row">
        <div class="col-md-3">
            <div class="d-none d-md-block">
                @include('user.dashboard.layouts.navbar')
            </div>
        </div>

        <div class="col-md-9">
            <div class="list-group">
                @foreach ($recent_messages as $recent_message)
                @php
                $user = DB::table('users')->where('id',$recent_message->from_id)->first();
                @endphp
                <a href="{{ url('my/inbox/' . $recent_message->to_id) }}"
                    class="list-group-item list-group-item-action">{{ $user->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
