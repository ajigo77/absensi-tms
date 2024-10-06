<nav class="app-header navbar navbar-expand bg-red-600 fixed top-0 left-0 w-full z-50"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <div class="flex text-center justify-center">
                <li class="nav-item">
                    <img src="{{ asset('./tdash/dist/assets/img/logo-company/tms.png') }}" alt="Logo Company"
                        class="w-10 rounded-full">
                </li>
                <li class="nav-item d-none d-md-block fw-bold">
                    <a href="#" class="nav-link text-white">Absensi Karyawan</a>
                </li>
            </div>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#"
                    class="nav-link dropdown-toggle d-flex justify-content-center align-items-center text-center"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('./tdash/dist/assets/img/user2-160x160.jpg') }}"
                        class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline text-white text-capitalize">aji setiawan</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header border-bottom d-flex flex-column align-items-center">
                        <img src="{{ asset('./tdash/dist/assets/img/user2-160x160.jpg') }}"
                            class="rounded-circle shadow mb-3" alt="User Image" style="width: 80px; height: 80px;">
                        <p class="text-center">
                            Aji Setiawan
                            <br>
                            <small>IT Support</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat border">
                            <i class="bi bi-person-circle mr-1"></i>
                            Profile
                        </a>
                        <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat float-end border">
                            <i class="bi bi-box-arrow-left mr-1"></i>
                            Keluar
                        </a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>

            </li> <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
