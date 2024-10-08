<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard | TMS</title><!--begin::Primary Meta Tags-->
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
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('./logo-company/favicon-tms.png') }}" type="image/x-icon">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        {{-- Navbar --}}
        {{-- <x-navbar.navbar></x-navbar.navbar> --}}
        {{-- Sidebar --}}
        <x-dashboard.sidebar></x-dashboard.sidebar>
        <main class="app-main">
            <x-dashboard.navigation></x-dashboard.navigation>
            <div class="app-content">
                <div class="container-fluid">
                    {{-- Card --}}
                    <x-dashboard.card></x-dashboard.card>
                    {{-- Card Grafik --}}
                    <x-dashboard.card-grafik></x-dashboard.card-grafik>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    {{-- Profile Karyawan --}}
                                    <x-dashboard.card-profile-karyawan></x-dashboard.card-profile-karyawan>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-capitalize">Data Karyawan</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button> <button type="button"
                                            class="btn btn-tool" data-lte-toggle="card-remove"> <i
                                                class="bi bi-x-lg"></i> </button> </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Id Member</th>
                                                    <th>Id Jabatan</th>
                                                    <th>Waktu Masuk</th>
                                                    <th>Waktu Keluar</th>
                                                    <th>Posisi/Divisi</th>
                                                    <th>Foto</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($usrs as $index => $user)
                                                    <tr>
                                                        <td class="text-dark-100">
                                                            {{ $index + 1 }}
                                                        </td>
                                                        <td>{{ $user->member_id }}</td>
                                                        <td>{{ $user->jabatan_id }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>{{ $user->divisi_id }}</td>
                                                        <td>
                                                            <a href="#" class="text-blue-600 underline">Belum
                                                                ada</a>
                                                        </td>
                                                        <td>{{ $user->status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->
                                </div> <!-- /.card-body -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination float-end  mt-2 mb-2 mx-2">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-dashboard.footer></x-dashboard.footer>
    </div>
    @include('components.script')
</body>

</html>
