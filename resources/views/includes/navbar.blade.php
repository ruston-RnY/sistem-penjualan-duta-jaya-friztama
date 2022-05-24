<nav class="navbar">
    <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="navbar_left">
        <span class="text-animate font-bold text-muted"></span>
    </div>
    <div class="navbar_right">
        @auth
            <span style="color: #a5aaad; font-size: 14px">&copy; PT. Duta Jaya Friztama - 2022</span>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-logout ml-3">
                  Logout
                </button>
            </form>
        @endauth
    </div>
</nav>