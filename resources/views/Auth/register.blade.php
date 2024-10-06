<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Register</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Login Page">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
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
    <link rel="stylesheet" href="{{ asset('./tdash/dist/css/adminlte.css') }}"><!--end::Required Plugin(AdminLTE)-->

    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to bottom right, #d30f0f, #ffacac);
            background-size: cover;
            background-position: center;
            z-index: -100;
            position: relative;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body rounded">
                <div class="login-logo flex justify-center mt-3 mb-5"> <img
                        src="{{ asset('./tdash/dist/assets/img/logo-company/tms.png') }}" alt="Logo TMS" width="60"
                        style="background-blend-mode: color-burn; border-radius: 100px;">
                </div> <!-- /.login-logo -->
                <form action="{{ route('proses.register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Id Member" name="member_id"
                                value="{{ old('member_id') }}">
                            <div class="input-group-text">
                                <span class="bi bi-hash"></span>
                            </div>
                        </div>
                        @error('member_id')
                            <span class="text-red-50">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-control" name="divisi_id">
                                <option value="">Pilih Divisi</option>
                                <option value="2" {{ old('divisi_id') == '2' ? 'selected' : '' }}>
                                    SDM
                                </option>
                                <option value="3" {{ old('divisi_id') == '3' ? 'selected' : '' }}>
                                    UMB
                                </option>
                                <option value="4" {{ old('divisi_id') == '4' ? 'selected' : '' }}>
                                    ACK
                                </option>
                                <option value="5"
                                    {{ old('divisi_id') == '5' ? 'selected' : '' }}>
                                    ITS
                                </option>
                                <option value="6" {{ old('divisi_id') == '6' ? 'selected' : '' }}>
                                    RPU
                                </option>
                                <option value="7" {{ old('divisi_id') == '7' ? 'selected' : '' }}>
                                    MPJ
                                </option>
                            </select>
                            <div class="input-group-text">
                                <span class="bi bi-person"></span>
                            </div>
                        </div>
                        @error('divisi_id')
                            <span class="text-red-50">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-control" name="jabatan_id">
                                <option value="">Pilih Jabatan</option>
                                <option value="2" {{ old('jabatan_id') == '2' ? 'selected' : '' }}>
                                    Owner
                                </option>
                                <option value="3" {{ old('jabatan_id') == '3' ? 'selected' : '' }}>
                                    Penasihat
                                </option>
                                <option value="4" {{ old('jabatan_id') == '4' ? 'selected' : '' }}>
                                    Komisaris
                                </option>
                                <option value="5"
                                    {{ old('jabatan_id') == '5' ? 'selected' : '' }}>
                                    Direktur Utama
                                </option>
                                <option value="6" {{ old('jabatan_id') == '6' ? 'selected' : '' }}>
                                    Direktur Keuangan
                                </option>
                                <option value="7" {{ old('jabatan_id') == '7' ? 'selected' : '' }}>
                                    Direktur Operasional
                                </option>
                                <option value="8" {{ old('jabatan_id') == '8' ? 'selected' : '' }}>
                                    Direktur Pengembangan
                                </option>
                                <option value="9" {{ old('jabatan_id') == '9' ? 'selected' : '' }}>
                                    General Manager
                                </option>
                                <option value="10" {{ old('jabatan_id') == '10' ? 'selected' : '' }}>
                                    Marketing Manager
                                </option>
                                <option value="11" {{ old('jabatan_id') == '11' ? 'selected' : '' }}>
                                    Manager Personalia
                                </option>
                                <option value="12" {{ old('jabatan_id') == '12' ? 'selected' : '' }}>
                                    Manager Teknologi
                                </option>
                                <option value="13" {{ old('jabatan_id') == '13' ? 'selected' : '' }}>
                                    Kadiv ACK
                                </option>
                                <option value="14" {{ old('jabatan_id') == '14' ? 'selected' : '' }}>
                                    Kadiv MPJ
                                </option>
                                <option value="15" {{ old('jabatan_id') == '15' ? 'selected' : '' }}>
                                    Kadiv SDM
                                </option>
                                <option value="16" {{ old('jabatan_id') == '16' ? 'selected' : '' }}>
                                    Kadiv UMB
                                </option>
                                <option value="17" {{ old('jabatan_id') == '17' ? 'selected' : '' }}>
                                    Kadiv ITS
                                </option>
                                <option value="18" {{ old('jabatan_id') == '18' ? 'selected' : '' }}>
                                    Kadiv RPU
                                </option>
                                <option value="19" {{ old('jabatan_id') == '19' ? 'selected' : '' }}>
                                    Staff ACK
                                </option>
                                <option value="20" {{ old('jabatan_id') == '20' ? 'selected' : '' }}>
                                    Staff MPJ
                                </option>
                                <option value="21" {{ old('jabatan_id') == '21' ? 'selected' : '' }}>
                                    Staff SDM
                                </option>
                                <option value="22" {{ old('jabatan_id') == '22' ? 'selected' : '' }}>
                                    Staff UMB
                                </option>
                                <option value="23" {{ old('jabatan_id') == '23' ? 'selected' : '' }}>
                                    Staff ITS
                                </option>
                                <option value="24" {{ old('jabatan_id') == '24' ? 'selected' : '' }}>
                                    Staff RPU
                                </option>
                                <option value="25" {{ old('jabatan_id') == '25' ? 'selected' : '' }}>
                                    MF
                                </option>
                                <option value="26" {{ old('jabatan_id') == '26' ? 'selected' : '' }}>
                                    TS
                                </option>
                            </select>
                            <div class="input-group-text">
                                <span class="bi bi-person"></span>
                            </div>
                        </div>
                        @error('jabatan_id')
                            <span class="text-red-50">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group"> <input type="password" class="form-control" placeholder="Password"
                                name="password">
                            <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                        </div>
                        @error('password')
                            <span class="text-red-50">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="flex justify-between items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Ingatkan Saya
                                </label>
                            </div>
                            <a href="{{ route('auth.login') }}" class="text-sm text-blue-500 hover:underline">
                                Sudah punya akun?
                            </a>
                        </div>
                        <div class="mt-2">
                            <div class="d-grid gap-2"> <button type="submit" class="btn btn-danger">Register</button>
                            </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
            </div> <!-- /.login-card-body -->
        </div>
    </div> <!-- /.login-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
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
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body><!--end::Body-->

</html>
