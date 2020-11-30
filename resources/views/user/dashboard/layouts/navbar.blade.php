<form id="logoutForm" action="{{ url('logout') }}" method="POST">
    @csrf
</form>

<div class="list-group">
    <li class="list-group-item">Your Points - @if (Auth::user()->point)
        @if (Auth::user()->point->points > 0)
        <span class="text-primary">{{ Auth::user()->point->points }} Points @else <span class="text-danger">0 Points
            </span>
            @endif
            @else
            <span class="text-danger">0 Points
            </span>
            @endif<a class="text-success" href="{{ url('my/buy-point') }}"><u>Buy More</u></a></span>
    </li>
    <a href="{{ url('my/account') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-angle-right"></i> My Account
    </a>
    <a href="{{ url('my/saved') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-angle-right"></i> Saved Posts
    </a>
    <a href="{{ url('my/inbox') }}" class="list-group-item list-group-item-action">
        <i class="fas fa-angle-right"></i> Message Inbox <span class="badge badge-danger">New</span>
    </a>
    <a href="{{ url('my/buy-point') }}" class="list-group-item list-group-item-action"><i
            class="fas fa-angle-right"></i> Buy
        Points</a>

    <a href="{{ url('my/upload-property') }}" class="list-group-item list-group-item-action"><i
            class="fas fa-angle-right"></i>
        Upload Property</a>

    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logoutForm').submit();" class="list-group-item list-group-item-action"> <i
            class="fas fa-angle-right"></i>
        Logout</a>
</div>
