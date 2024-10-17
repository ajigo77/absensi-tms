<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Component Style -->
    <x-src.link-style></x-src.link-style>

    {{-- MDBOOTSTRAP --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #e1f0ff;">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('image/src/login-ilustrasi.png') }}" alt="login form"
                                    class="img-fluid mt-5" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('proses.login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('logo-company/tms.png') }}" alt="Logo Company"
                                                width="40" class="me-3">
                                            <span class="fs-4 fw-bold mb-0">TMS</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3">Masuk ke akun Anda
                                            akun
                                        </h5>
                                        <div>
                                            @error('member_id')
                                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                                <!-- Menambahkan margin top -->
                                            @enderror
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" name="member_id"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form2Example17">Id Member</label>
                                            </div>
                                        </div>
                                        <div>
                                            @error('password')
                                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                                <!-- Menambahkan margin top -->
                                            @enderror
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" name="password"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form2Example27">Password</label>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-danger btn-lg btn-block" type="submit">Login
                                            </button>
                                        </div>
                                    </form>
                                    <p class="mb-5 pb-lg-2">
                                        Belum punya
                                        akun?
                                        <a href="{{ route('auth.register') }}" style="color: #393f81;">Register
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Component Script --}}
    <x-src.link-script></x-src.link-script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
    @if ($pesan_error = Session::get('failed'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ $pesan_error }}",
                icon: "error"
            });
        </script>
    @endif
    @if ($success_register = Session::get('success'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ $success_register }}",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
