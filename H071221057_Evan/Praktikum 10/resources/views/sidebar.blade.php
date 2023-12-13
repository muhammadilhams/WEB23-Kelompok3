<!-- resources/views/sidebar.blade.php -->
<style>
    .nav-link.active {
        color: white !important;
    }

    #sidebar {
        height: 100vh; /* Set tinggi sidebar sesuai dengan tinggi viewport */
    }

    .sidebar-sticky {
        position: sticky;
        top: 0;
        height: 100%;
        padding-top: 20px; /* Sesuaikan sesuai kebutuhan Anda */
    }
</style>

<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    Dashboard
                </a>
            </li>
        </ul>
    </div>
</nav>
