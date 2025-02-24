<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('backoffice.home') }}">{{ config('app.name') }}</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/user.webp') }}" width="40" height="40" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu pull-right" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a href="{{ route('backoffice.profile.edit') }}">
                                <i class="material-icons">person</i>
                                Profile
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a onclick="
                            event.preventDefault();
                            confirm('Are you sure to logout your session') ? document.getElementById('logout').submit() : Nan">

                                <i class="material-icons">input</i>
                                Sign Out
                            </a>

                            <form action="{{ route('logout') }}" method="post" id="logout">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
