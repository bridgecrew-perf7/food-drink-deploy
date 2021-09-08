<a class="navbar-brand" href="{{ route('home') }}">Food & Dinks</a>
<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
<ul class="navbar-nav d-flex d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="row">
        <li class="nav-item">
            <a class="nav-link @if (session('website_language') == 'en') active @endif"
                href="{{ route('change-language', ['en']) }}">EN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (session('website_language') == 'vi') active @endif"
                href="{{ route('change-language', ['vi']) }}">VI</a>
        </li>
        <li class="nav-item">
            <span class="nav-link">|</span>
        </li>
    </div>
</ul>
<ul class="navbar-nav ml-auto ml-md-0">
    <li class="dropdown dropdown-notifications">
        <a class="nav-link text-light" href="#" id="notifyDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <div class="notification">
                <i class="fa fa-bell" onclick="setCountNotification()"></i>
                <span class="badge" hidden>0</span>
            </div>
        </a>
        <ul class="dropdown-menu" id="dropdown-menu-notify">
            <li class="head text-light bg-dark">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <span>Notifications ({{$count_notification}})</span>
                        <!-- <a href="" class="float-right text-light">Mark all as read</a> -->
                    </div>
                </div>
            </li>
            <li class="notification-box">
                @foreach($notifications as $notification)
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="{{$notification->users->image}}" class="image_notify">
                    </div>
                    <div class="col-lg-7 col-sm-7 col-7">
                        <div>
                            {{$notification->content}}
                        </div>
                        <small class="text-warning">{{$notification->created_at}}</small>
                    </div>
                    <div class="col-md-1">
                        <i class="fa fa-trash" style="color:#CB1E26;"></i>
                    </div>
                </div>
                @endforeach
            </li>
            <li class="footer bg-dark text-center">
                <a href="" class="text-light">View All</a>
            </li>
        </ul>
    </li>
</ul>

<ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">{{ __('custom.profile') }}</a>
            <a class="dropdown-item" href="{{ asset('/logout') }} " onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('custom.logout') }}</a>
            <form id="logout-form" action="{{ asset('/logout') }}" method="GET" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>