<!-- Membuat elemen navigasi dengan latar belakang warna biru (bg-primary) dan teks putih (navbar-dark) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Membungkus elemen navigasi dalam wadah (container) dengan margin bawah 4 unit dan margin atas 4 unit -->
    <div class="container mb-4 mt-4">
    <!-- Membuat tautan ke beranda dengan teks "Classic Models" -->
        <a class="navbar-brand" href="/">Classic Models</a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
            <!-- Tombol toggler untuk menampilkan atau menyembunyikan menu navigasi pada perangkat seluler -->
            <!-- Ikon toggler yang ditampilkan saat menu navigasi disembunyikan -->
            <span class="navbar-toggler-icon"></span> 
        </button>
        <!-- Membuat area untuk menu navigasi yang dapat menyusut saat tidak digunakan -->
        <div class="collapse navbar-collapse ms-4" id="navbarNav"> 
            <!-- Daftar menu navigasi dengan urutan dari kiri ke kanan (me-auto) -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- Tautan menu ke beranda dengan class 'active' jika halaman saat ini adalah beranda -->
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a> 
                </li>
                <li class="nav-item">
                    <!-- Tautan menu ke halaman produk dengan class 'active' jika halaman saat ini adalah halaman produk -->
                    <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product">Products</a> 
                </li>
            </ul>
            <!-- Form pencarian dengan input teks dan tombol pencarian -->
            <form class="d-flex align-items-end" action="{{ route('products.search') }}" method="GET"> 
                <!-- Input pencarian dengan placeholder dan label aksesibilitas -->
                <input class="form-control me-2" type="search" name="productLine" placeholder="Search by Product Line" aria-label="Search"> 
                <!-- Tombol pencarian dengan latar belakang dan teks warna biru muda -->
                <button class="btn btn-secondary" style="background-color: #89CFF3; color: #000000" type="submit">Search</button> 
            </form>            
        </div>
    </div>
</nav>


<!-- navbarnya -->
