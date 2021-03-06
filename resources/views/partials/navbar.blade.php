<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Posts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
            <!-- @if(auth()->check()) -->
            <li class="nav-item">
                <a class="nav-link" href="/posts/create">Create a post</a>
            </li>
            <!-- @endif -->
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="/">Welcome</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about-us">About us</a>
            </li>
            @guest
            <!-- @if(!auth()->check()) -->
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <!-- @endif -->
            @endguest

            @auth
            <li class="nav-item">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-link">{{auth()->user()->name}}, Logout</button>
                </form>
            </li>
            @endauth

            <li class="nav-item">
                <span class="nav-link">{{session('req_count', 0)}} Requests</span>
            </li>
        </ul>
    </div>
</nav>