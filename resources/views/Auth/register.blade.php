<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                                <img src="{{ asset('image/src/register-ilustrasi.png') }}" alt="login form"
                                    class="img-fluid mt-5" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('proses.register') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('logo-company/tms.png') }}" alt="Logo Company"
                                                width="40" class="me-3">
                                            <span class="fs-4 fw-bold mb-0">TMS</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3">Daftar dan buat akun Anda
                                        </h5>
                                        <div>
                                            @error('member_id')
                                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" name="member_id"
                                                class="form-control form-control-lg"
                                                value="{{ old('member_id') }}" />
                                                <label class="form-label" for="form2Example17">Id Member</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @error('divisi_id')
                                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                            <div class="input-group">
                                                <select class="form-control" name="divisi_id">
                                                    <option value="">Pilih Divisi</option>
                                                    @forelse ($devisi as $dvs)
                                                        <option value="{{ $dvs->id_divisi }}"
                                                            {{ old('divisi_id') == $dvs->id_divisi ? 'selected' : '' }}>
                                                            {{ $dvs->nama }}
                                                        </option>
                                                    @empty
                                                        <option value="">
                                                            Tidak Ada Devisi
                                                        </option>
                                                    @endforelse
                                                </select>
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-vcard"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @error('jabatan_id')
                                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                            <div class="input-group">
                                                <select class="form-control" name="jabatan_id">
                                                    <option value="">Pilih Jabatan</option>
                                                    @forelse ($jabatan as $jbt)
                                                        <option value="{{ $jbt->id_jabatan }}"
                                                            {{ old('jabatan_id') == $jbt->id_jabatan ? 'selected' : '' }}>
                                                            {{ $jbt->nama }}
                                                        </option>
                                                    @empty
                                                        <option value="">
                                                            Tidak ada jabatan
                                                        </option>
                                                    @endforelse
                                                </select>
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-vcard-fill"></i>
                                                </div>
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
                                            <button class="btn btn-danger btn-lg btn-block" type="submit">Register
                                            </button>
                                        </div>
                                    </form>
                                    <p class="mb-5 pb-lg-2">
                                        Sudah punya
                                        akun?
                                        <a href="{{ route('auth.login') }}" style="color: #393f81;">Login
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
