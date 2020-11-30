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
            <div class="messages_div">
                @php
                $message = $messages->first();
                $user = DB::table('users')->where('id',$message->to_id)->first();
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h5">
                        {{ $user->name }}
                    </span>
                    <a href="#" class="text-success">
                        <i class="fas fa-info-circle"></i> About
                    </a>
                </div>
                <hr>
                <ul class="list-group list-group-flush">
                    @foreach ($messages as $message)
                    @php
                    $from_user = DB::table('users')->where('id',$message->from_id)->first();
                    $to_user = DB::table('users')->where('id',$message->to_id)->first();
                    @endphp
                    <li style="list-style: none;" class="py-3 px-2 rounded
                    @if ($message->from_id == Auth::id())
                     bg-success text-white
                    @endif">
                        {{ $message->message }}
                        <span class="d-block text-right px-2">
                            <small>
                                {{ $message->created_at->diffForHumans() }}
                            </small>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="inbox_div mt-3">
                <form action="">
                    <input type="text" name="" class="form-control" id="">
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
