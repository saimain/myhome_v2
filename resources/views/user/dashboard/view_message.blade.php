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
                $user = DB::table('users')->where('id',request()->user_id)->first();
                @endphp
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h5">
                        @if ($user->is_agent == true)
                        {{ $user->agent_name }} <span class="text-success"><small>(Agent)</small></span>
                        @else
                        {{ $user->name }}
                        @endif
                    </span>
                    <button type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal"
                        data-target="#aboutModal">
                        <i class="fas fa-info-circle"></i> About
                    </button>
                    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Account Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h5>
                                            @if ($user->is_agent == true)
                                            {{ $user->agent_name }} <span
                                                class="text-success"><small>(Agent)</small></span>
                                            @else
                                            {{ $user->name }}
                                            @endif
                                        </h5>
                                        <p class="mt-2">
                                            @if ($user->is_agent == true)
                                            {{ $user->agent_phone }}
                                            @else
                                            {{ $user->phone }}
                                            @endif
                                        </p>
                                        <p>
                                            {{ $user->email }}
                                        </p>
                                        <p>
                                            @if ($user->is_agent == true)
                                            {{ $user->agent_address }}
                                            @endif
                                        </p>
                                        <p>
                                            @if ($user->is_agent == true)
                                            {{ $user->agent_about }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <ul class="list-group list-group-flush">
                    @if ($messages->count() > 0)
                    @foreach ($messages as $message)
                    @php
                    $from_user = DB::table('users')->where('id',$message->from_id)->first();
                    $to_user = DB::table('users')->where('id',$message->to_id)->first();
                    @endphp
                    <li style="list-style: none;" class="py-3 px-2 rounded mt-2
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
                    @else
                    <p class="text-center"><small>No Message</small></p>
                    @endif
                </ul>
            </div>
            <div class="inbox_div mt-3">
                <form action="{{ url('my/inbox/' . request()->user_id) }}" method="POST">
                    @csrf
                    <input type="text" name="message" class="form-control" id="">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary text-white mt-2">Send</button>
                    </div>
                </form>
            </div>


        </div>


    </div>

</div>

@endsection
