<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a href="{{ URL::route('home') }}" class="navbar-brand">Blogum</a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('home') }}">Home</a></li>
                <li><a href="{{ URL::action('PostsController@index') }}">All Posts</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><a href="{{ URL::route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                @else
                    <li><a href="{{ URL::route('admin') }}"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>