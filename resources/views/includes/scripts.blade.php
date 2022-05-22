<script src="{{ url('backend/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('backend/libraries/bootstrap-4.5.3-dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12 "></script>
<script>
    var sidebar = document.getElementById("sidebar");
    var container = document.getElementById("container");

    function toggleSidebar() {
        container.classList.toggle("container_responsive");
        sidebar.classList.toggle("sidebar_responsive");
    }

    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
            $(e.target)
        .prev()
        .find("i:last-child")
        .toggleClass("fa-minuss");
    });
</script>
<script>
    var typed = new Typed(".text-animate ", {
        strings: [
            "Selamat Datang Admin", "Di sistem pengelolaan data PT. Duta Jaya Friztama"
        ],
        typeSpeed: 100,
        backSpeed: 100,
        loop: true
    });
</script>