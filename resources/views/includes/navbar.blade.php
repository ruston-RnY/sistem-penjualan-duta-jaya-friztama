<nav class="navbar">
    <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="navbar_left">
        <span class="text-animate font-bold text-muted"></span>
    </div>
    <div class="navbar_right">
        @auth
            <span>{{ auth()->user()->name }}</span>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-logout ml-3">
                  Logout
                </button>
            </form>
        @else
            <span>Toni</span>
        @endauth
    </div>
</nav>