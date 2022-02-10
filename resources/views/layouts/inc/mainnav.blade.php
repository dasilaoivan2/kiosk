<ul class="navbar-nav mr-auto">

    {{--<li class="nav-item btn"> <a href="{{route('voters.index')}}"> Add Responsible Employee </a></li>--}}



    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('admin.services.index')}}"><i class="fas fa-shopping-basket"></i> Services</a></li>

    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('admin.users.index')}}"><i class="fas fa-users"></i> Responsible Employee </a></li>

    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('admin.locations.index')}}"><i class="fas fa-retweet"></i> Locations </a></li>

    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('admin.offices.index')}}"><i class="fas fa-kaaba"></i> Offices </a></li>

    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('admin.ads.index')}}"><i class="fas fa-ad"></i> Ads </a></li>

    <li class="nav-item dropdown">
        <a style="color: white; text-decoration: none" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-print"></i> Print
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('admin.prints.daily.index')}}">Daily</a>
            <a class="dropdown-item" href="{{route('admin.prints.monthly.index')}}">Monthly</a>
            <a class="dropdown-item" href="{{route('admin.prints.range.index')}}">Date Range</a>
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">Something else here</a>--}}
        </div>
    </li>
</ul>