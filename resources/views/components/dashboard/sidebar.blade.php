<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index2.html" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ asset('./logo-company/favicon-tms.png') }}"
                alt="Logo TMS" class="brand-image opacity-75 shadow"> <!--end::Brand Image-->
            <!--begin::Brand Text--> <span class="brand-text fw-light fs-6">P.T Tecnology Multi System</span>
            <!--end::Brand Text--> </a>
        <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dash.main') }}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="bi bi-building"></i>
                        <p>
                            Kantor
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="bi bi-clock"></i>
                        <p>
                            Shift
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dash.absensi') }}" class="nav-link"> <i class="bi bi-calendar-check"></i>
                        <p>
                            Absensi
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dash.izin') }}" class="nav-link"> <i class="bi bi-file-earmark-check"></i>
                        <p>
                            Pengajuan Izin
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dash.absensi') }}" class="nav-link"> <i class="bi bi-file-earmark-person"></i>
                        <p>
                            Pengajuan cuti
                        </p>
                    </a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
