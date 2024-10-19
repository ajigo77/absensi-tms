<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper" id="sidenavWrapper">
    <!-- Sidenav Profile-->
    <div class="sidenav-profile">
        <div class="user-profile">
            <img src="{{ asset('assets/img/koci.png') }}" width="80" height="auto" alt="Logo">
        </div>
        <div class="user-info">
            <h6 class="user-name mb-0">Jhon Dhoe</h6>
        </div>
    </div>
    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
        {{-- <li>
            <a href="https://sixghakreasi.com/demos/attd_mobile/profile">
                <i class="lni lni-user"></i>Profil Ku
            </a>
        </li> --}}
        <li>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="lni lni-power-switch" style="margin-right: 0.5rem"></i>
                    Keluar
                </button>
            </form>
        </li>
        {{-- <li>
            <a href="https://sixghakreasi.com/demos/attd_mobile/setting"><i class="lni lni-cog"></i>
                Pengaturan
            </a>
        </li> --}}
    </ul>
    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn">
        <i class="bi bi-layout-sidebar"></i>
        </i>
    </div>
</div>
