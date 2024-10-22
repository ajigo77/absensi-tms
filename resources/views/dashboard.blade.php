<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard | TMS</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="TMS | Dashboard">
    <x-link-cdn></x-link-cdn>
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
                                                    <th>User Id</th>
                                                    <th>Jenis Absen</th>
                                                    <th>Shift Id</th>
                                                    <th>Status</th>
                                                    <th>Tanggal/Jam</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($absen as $abs)
                                                    <tr>
                                                        <td class="text-dark-100">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>{{ $abs->user_id }}</td>
                                                        <td>{{ $abs->type }}</td>
                                                        <td>{{ $abs->shift_id }}</td>
                                                        <td>{{ $abs->status }}</td>
                                                        <td>{{ $abs->created_at }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                Lihat foto
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Foto</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body p-3">
                                                                            <img src="{{ asset('webcam/' . $abs->foto) }}" alt="My Foto" class="w-100 h-100 rounded">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
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
