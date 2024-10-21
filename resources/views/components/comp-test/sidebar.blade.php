<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper" id="sidenavWrapper">
    <!-- Sidenav Profile-->
    <div class="sidenav-profile">
        <div class="user-profile">
            <img src="{{ asset('image/src/avatar-profile.png') }}" width="80" height="auto" alt="Logo">
        </div>
        <div class="user-info">
            <h6 class="user-name mb-0 text-secondary">ID User : {{ Auth::user()->id_user }}</h6>
            <p class="text-secondary user-name">{{ Auth::user()->Member->nama }}</p>
        </div>
    </div>
    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
        <li>
            <a href="{{ route('hero') }}">
                <i class="bi bi-house text-danger"></i>Beranda
            </a>
        </li>
        <li>
            <a href="{{ route('index') }}">
                <i class="bi bi-houses text-danger"></i>Halaman Utama
            </a>
        </li>
        <li>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="lni lni-power-switch text-danger" style="margin-right: 0.5rem"></i>
                    Keluar
                </button>
            </form>
        </li>
    </ul>
    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn">
        <i class="bi bi-layout-sidebar"></i>
        </i>
    </div>
</div>
