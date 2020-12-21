@extends('user.layouts.master')

@section('content')


<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <p><i class="fas fa-user-friends"></i> Agents</p>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($agents as $agent)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/agent_profile/' . $agent->agent_profile) }}" class="card-img-top"
                            style="height: 200px" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ url('/agent/' . $agent->agent_name) }}">
                                    {{$agent->agent_name}}
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                {{ $agents->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="fb-page" data-href="https://web.facebook.com/myhomemyanmar1" data-tabs="" data-width=""
                data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://web.facebook.com/myhomemyanmar1" class="fb-xfbml-parse-ignore"><a
                        href="https://web.facebook.com/myhomemyanmar1">My Home Myanmar</a></blockquote>
            </div>
            <hr>
            <p>Advertisements</p>
            @include('user.advertises')
        </div>
    </div>
</div>



@endsection
