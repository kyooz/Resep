<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Resep</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse py-2 px-4" id="navbarSupportedContent">
            
            @auth
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="/categories" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">Kategori</a></li>
                <li class="nav-item"><a href="/articles" class="nav-link {{ Request::is('articles') ? 'active' : '' }}">Artikel</a></li>
            </ul>
            <ul class="nav ms-auto">
                <li class="nav-item dropdown ms-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window"></i> My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="/categories" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">Kategori</a></li>
                <li class="nav-item"><a href="/articles" class="nav-link {{ Request::is('articles') ? 'active' : '' }}">Artikel</a></li>
            </ul>
            <ul class="nav ms-auto">
                <li class="nav-item ms-auto"><a href="/login" class="nav-link">Login</a></li>
            </ul>
            @endauth
        </div>
    </div>
</nav>