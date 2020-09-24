<ul class="navbar-nav mr-auto">

    {{--<li class="nav-item btn"> <a href="{{route('voters.index')}}"> Add Responsible Employee </a></li>--}}






    {{--<li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('employee.served')}}"><i class="fas fa-server"></i> Served Clients</a></li>--}}

    <li class="nav-item dropdown">
        <a style="color: white; text-decoration: none" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-book"></i>
            Clients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{route('employee.index')}}"><i class="fas fa-child"></i> Clients for today</a>


            <a class="dropdown-item" href="{{route('employee.servedtoday')}}"><i class="fas fa-atlas"></i> Served Clients as of Today</a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{route('employee.served')}}"><i class="fas fa-server"></i> Served Clients </a>

            <a class="dropdown-item" href="{{route('employee.pending')}}"><i class="fas fa-archive"></i> Pending Clients</a>

        </div>
    </li>

    <li class="nav-item btn"> <a style="color: white; text-decoration: none" href="{{route('employee.services.index')}}"><i class="fas fa-shopping-basket"></i> Services</a></li>

    {{--<li class="nav-item btn"> <a href="{{route('admin.users.index')}}">Responsible Employee </a></li>--}}

    {{--<li class="nav-item btn"> <a href="{{route('admin.locations.index')}}">Locations </a></li>--}}

    {{--<li class="nav-item btn"> <a href="{{route('admin.offices.index')}}">Offices </a></li>--}}

</ul>