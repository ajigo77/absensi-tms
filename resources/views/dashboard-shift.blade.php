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
            <x-dashboard.navigation-shift></x-dashboard.navigation-shift>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <x-dashboard.card-profile-karyawan></x-dashboard.card-profile-karyawan>
                                </div>
                            </div> --}}
                            {{-- Border - table --}}
                            {{-- <x-tables.border-table :absens="$absens"></x-tables.border-table> --}}
                            <x-tables.shift-table :shifts="$shifts"></x-tables.shift-table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-dashboard.footer></x-dashboard.footer>
    </div>
    <x-script></x-script>
</body>

</html>
