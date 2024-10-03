<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>TMS | Dashboard</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="TMS | Dashboard">
    <!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('./tdash/dist/css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Beranda</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Kontak</a> </li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->

            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index2.html" class="brand-link">
                    <!--begin::Brand Image--> <img src="{{ asset('./tdash/dist/assets/img/logo-company/tms.png') }}"
                        alt="Logo TMS" class="brand-image opacity-75 shadow"> <!--end::Brand Image-->
                    <!--begin::Brand Text--> <span class="brand-text fw-light fs-6">P.T Tecnology Multi System</span>
                    <!--end::Brand Text--> </a>
                <!--end::Brand Link-->
            </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column nav-treeview">
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i
                                    class="nav-icon bi bi-pencil-square"></i>
                                <p>
                                    Formulir
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="./tables/simple.html" class="nav-link"> <i
                                    class="nav-icon bi bi-table"></i>
                                <p>
                                    Tabel Data
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                        </li>
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->

        </aside> <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-primary shadow-sm"> <i
                                        class="bi bi-alarm-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Masuk Kerja</span> <span
                                        class="info-box-number">
                                        08:00
                                        <small>Pagi</small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-danger shadow-sm"> <i
                                        class="bi bi-alarm"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Pulang Kerja</span> <span
                                        class="info-box-number">
                                        04:00
                                        <small>Sore</small> </span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div>
                        <!-- <div class="clearfix hidden-md-up"></div> -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-success shadow-sm"> <i
                                        class="bi bi-people-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Total yang masuk</span>
                                    <span class="info-box-number">15 Orang</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-warning shadow-sm"> <i
                                        class="bi bi-person-fill-down"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Total yang tidak
                                        masuk</span> <span class="info-box-number">3 Orang</span> </div>
                                <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                    </div> <!-- /.row --> <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Rekapan Bulan Kemarin</h5>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button>
                                        <div class="btn-group"> <button type="button"
                                                class="btn btn-tool dropdown-toggle" data-bs-toggle="dropdown"> <i
                                                    class="bi bi-wrench"></i> </button>
                                            <div class="dropdown-menu dropdown-menu-end" role="menu"> <a
                                                    href="#" class="dropdown-item">Action</a> <a href="#"
                                                    class="dropdown-item">Another action</a> <a href="#"
                                                    class="dropdown-item">
                                                    Something else here
                                                </a> <a class="dropdown-divider"></a> <a href="#"
                                                    class="dropdown-item">Separated link</a> </div>
                                        </div> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button>
                                    </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body"> <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center"> <strong>1 September - 30 September 2024</strong>
                                            </p>
                                            <div id="sales-chart"></div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center"> <strong>Penyelesaian Tujuan</strong> </p>
                                            <div class="progress-group">
                                                Masuk Kerja
                                                <span class="float-end"><b>160</b>/200</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-primary" style="width: 80%">
                                                    </div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                            <div class="progress-group">
                                                Pulang Kerja
                                                <span class="float-end"><b>310</b>/400</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-danger" style="width: 75%"></div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                            <div class="progress-group"> <span class="progress-text">Total yang
                                                    masuk</span> <span class="float-end"><b>480</b>/800</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-success" style="width: 60%">
                                                    </div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                            <div class="progress-group">
                                                Total yang tidak masuk
                                                <span class="float-end"><b>250</b>/500</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-warning" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                        </div> <!-- /.col -->
                                    </div> <!--end::Row-->
                                </div> <!-- ./card-body -->
                                <div class="card-footer"> <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <div class="text-center border-end"> <span class="text-success"> <i
                                                        class="bi bi-caret-up-fill"></i> 17%
                                                </span> <span class="text-uppercase">PENINGKATAN</span>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-6 col-6">
                                            <div class="text-center border-end"> <span class="text-danger"> <i
                                                        class="bi bi-caret-down-fill"></i> 0%
                                                </span>
                                                <span class="text-uppercase">PENURUNAN</span>
                                            </div>
                                        </div> <!-- /.col -->
                                    </div> <!--end::Row-->
                                </div> <!-- /.card-footer -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row--> <!--begin::Row-->
                    <div class="row"> <!-- Start col -->
                        <div class="col-md-8"> <!--begin::Row-->
                            <div class="row g-4 mb-4">
                                <div class="col-md-6"> <!-- USERS LIST -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Profile Para Karyawan</h3>
                                            <div class="card-tools"> <span class="badge text-bg-danger">
                                                    15 Karyawan
                                                </span> <button type="button" class="btn btn-tool"
                                                    data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                        class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                        class="bi bi-dash-lg"></i> </button> <button type="button"
                                                    class="btn btn-tool" data-lte-toggle="card-remove"> <i
                                                        class="bi bi-x-lg"></i> </button> </div>
                                        </div> <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <div class="row text-center m-1">
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user1-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Alexander Pierce
                                                    </a>
                                                    <div class="fs-8">Today</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user1-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Norman
                                                    </a>
                                                    <div class="fs-8">Yesterday</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user7-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Jane
                                                    </a>
                                                    <div class="fs-8">12 Jan</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user6-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        John
                                                    </a>
                                                    <div class="fs-8">12 Jan</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user2-160x160.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Alexander
                                                    </a>
                                                    <div class="fs-8">13 Jan</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user5-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Sarah
                                                    </a>
                                                    <div class="fs-8">14 Jan</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user4-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Nora
                                                    </a>
                                                    <div class="fs-8">15 Jan</div>
                                                </div>
                                                <div class="col-3 p-2"> <img class="img-fluid rounded-circle"
                                                        src="{{ asset('./tdash/dist/assets/img/user3-128x128.jpg') }}"
                                                        alt="User Image"> <a
                                                        class="btn fw-bold fs-7 text-secondary text-truncate w-100 p-0"
                                                        href="#">
                                                        Nadia
                                                    </a>
                                                    <div class="fs-8">15 Jan</div>
                                                </div>
                                            </div> <!-- /.users-list -->
                                        </div> <!-- /.card-body -->
                                        <div class="card-footer text-center"> <a href="javascript:"
                                                class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                                All Users</a> </div> <!-- /.card-footer -->
                                    </div> <!-- /.card -->
                                </div> <!-- /.col -->
                            </div> <!--end::Row--> <!--begin::Latest Order Widget-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Absensi Karyawan</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button> <button type="button"
                                            class="btn btn-tool" data-lte-toggle="card-remove"> <i
                                                class="bi bi-x-lg"></i> </button> </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Posisi/Divisi</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($usrs as $index => $user)
                                                    <tr>
                                                        <td class="text-dark-100">
                                                            {{ $index + 1 }}
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->divisi }}</td>
                                                        <td>
                                                            <span class="badge text-bg-success">
                                                                Tepat
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->
                                </div> <!-- /.card-body -->
                                <div class="card-footer clearfix"> <a href="javascript:void(0)"
                                        class="btn btn-sm btn-primary float-start">
                                        Place New Order
                                    </a> <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-end">
                                        View All Orders
                                    </a> </div> <!-- /.card-footer -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div> <!--end::To the end-->
            <!--begin::Copyright--> <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('./tdash/dist/js/adminlte.js') }}"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        /* apexcharts
         * -------
         * Here we will create a few charts using apexcharts
         */

        //-----------------------
        // - MONTHLY SALES CHART -
        //-----------------------

        const sales_chart_options = {
            series: [{
                    name: "Digital Goods",
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: "Electronics",
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 180,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ["#0d6efd", "#20c997"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2023-01-01",
                    "2023-02-01",
                    "2023-03-01",
                    "2023-04-01",
                    "2023-05-01",
                    "2023-06-01",
                    "2023-07-01",
                ],
            },
            tooltip: {
                x: {
                    format: "MMMM yyyy",
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#sales-chart"),
            sales_chart_options,
        );
        sales_chart.render();

        //---------------------------
        // - END MONTHLY SALES CHART -
        //---------------------------

        function createSparklineChart(selector, data) {
            const options = {
                series: [{
                    data
                }],
                chart: {
                    type: "line",
                    width: 150,
                    height: 30,
                    sparkline: {
                        enabled: true,
                    },
                },
                colors: ["var(--bs-primary)"],
                stroke: {
                    width: 2,
                },
                tooltip: {
                    fixed: {
                        enabled: false,
                    },
                    x: {
                        show: false,
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return "";
                            },
                        },
                    },
                    marker: {
                        show: false,
                    },
                },
            };

            const chart = new ApexCharts(document.querySelector(selector), options);
            chart.render();
        }

        const table_sparkline_1_data = [
            25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54,
        ];
        const table_sparkline_2_data = [
            12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44,
        ];
        const table_sparkline_3_data = [
            15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64,
        ];
        const table_sparkline_4_data = [
            30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64,
        ];
        const table_sparkline_5_data = [
            20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64,
        ];
        const table_sparkline_6_data = [
            5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44,
        ];
        const table_sparkline_7_data = [
            12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74,
        ];

        createSparklineChart("#table-sparkline-1", table_sparkline_1_data);
        createSparklineChart("#table-sparkline-2", table_sparkline_2_data);
        createSparklineChart("#table-sparkline-3", table_sparkline_3_data);
        createSparklineChart("#table-sparkline-4", table_sparkline_4_data);
        createSparklineChart("#table-sparkline-5", table_sparkline_5_data);
        createSparklineChart("#table-sparkline-6", table_sparkline_6_data);
        createSparklineChart("#table-sparkline-7", table_sparkline_7_data);

        //-------------
        // - PIE CHART -
        //-------------

        const pie_chart_options = {
            series: [700, 500, 400, 600, 300, 100],
            chart: {
                type: "donut",
            },
            labels: ["Chrome", "Edge", "FireFox", "Safari", "Opera", "IE"],
            dataLabels: {
                enabled: false,
            },
            colors: [
                "#0d6efd",
                "#20c997",
                "#ffc107",
                "#d63384",
                "#6f42c1",
                "#adb5bd",
            ],
        };

        const pie_chart = new ApexCharts(
            document.querySelector("#pie-chart"),
            pie_chart_options,
        );
        pie_chart.render();

        //-----------------
        // - END PIE CHART -
        //-----------------
    </script> <!--end::Script-->
</body><!--end::Body-->

</html>
