<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Absensi</title>
    <x-link-cdn></x-link-cdn>
    @vite('resources/css/app.css')
</head>

<body class="font-sans">
    {{-- Navbar --}}
    <div class="wrapper">
        {{-- Navbar --}}
        <x-navbar.navbar></x-navbar.navbar>

        <!-- Main Content -->
        <x-card-component.content-card></x-card-component.content-card>

    </div>
    @if ($success = Session::get('success'))
    <script>
        Swal.fire({
            title: "Sukses",
            text: "{{ $success }}",
            icon: "success"
        });
        </script>
    @endif
    {{-- Footer --}}
    <x-dashboard.footer></x-dashboard.footer>
</body>

</html>
