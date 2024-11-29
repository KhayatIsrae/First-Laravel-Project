<nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-bottom-dark sticky-top" style="height: 80px">
    <div class="container">
        <a class="navbar-brand  fw-bold " href="/">
            <span class="fs-1">{{ config('app.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end bg-primary p-3 " id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/register">Register</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link fs-5 "
                            href="{{ route('users.show', auth()->id()) }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Log Out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
