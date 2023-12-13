<!-- resources/views/includes/sidebar.blade.php -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            Dashboard
        </h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cars1.index') }}">
                    <i class="fas fa-car"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users1.index') }}">
                    <i class="fas fa-user"></i> User List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('driver1.index') }}">
                    <i class="fas fa-car"></i> Driver List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('payments1.index') }}">
                    <i class="fas fa-credit-card"></i> Payment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cars1.index') }}">
                    <i class="fas fa-car"></i> Car List
                </a>
            </li>
        </ul>
    </div>
</nav>
