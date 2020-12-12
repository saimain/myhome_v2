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
            @if ($recent_messages->count() > 0)
            <div class="list-group">
                @foreach ($recent_messages->unique('from_id') as $recent_message)
                @php
                $user = DB::table('users')->where('id',$recent_message->from_id)->first();
                @endphp
                <a href="{{ url('my/inbox/' . $recent_message->to_id) }}"
                    class="list-group-item list-group-item-action">{{ $user->name }}</a>
                @endforeach
            </div>
            @else
            <p>
                Emply message box.
            </p>
            @endif
        </div>
    </div>

</div>

@endsection
