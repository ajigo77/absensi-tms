<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Izin Karyawan</title>
    {{-- Icons Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col h-screen font-sans">
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#fca5a5] to-[#fecaca] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <div class="mx-auto max-w-2xl text-center">
            <div class="flex justify-center items-center">
                <a href="{{ route('shift') }}"
                    class="mr-5 w-10 h-10 flex justify-center items-center hover:-translate-x-2 active:bg-[#fecaca] transition rounded-full hover:cursor-pointer">
                    <i class="bi bi-arrow-left font-bold text-dark-100 text-lg"></i>
                </a>
                <!-- Perbarui ukuran teks dengan responsif -->
                <h2 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl md:text-3xl lg:text-4xl">
                    Form Pengajuan Izin Karyawan
                </h2>
            </div>
            <p class="mt-2 text-sm sm:text-base md:text-lg leading-8 text-gray-600">
                Silakan isi form di bawah ini untuk izin karyawan.
            </p>
        </div>


        <form action="{{ route('post.izin') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            @csrf
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <!-- Informasi Karyawan -->
                <div>
                    <label for="nama" class="block text-sm font-semibold leading-6 text-gray-900">Nama
                        Karyawan <span class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <input type="text" id="nama" name="nama_karyawan" placeholder="Masukkan nama"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-dark-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            value="{{ old('nama_karyawan') }}">
                    </div>
                    @error('nama_karyawan')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="divisi" class="block text-sm font-semibold leading-6 text-gray-900">Divisi <span
                            class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <select id="divisi" name="divisi"
                            class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none">
                            <option value="" selected>Pilih Divisi Anda</option>
                            @forelse ($divisi as $dvs)
                                <option value="{{ $dvs->nama }}" {{ old('divisi') == $dvs->nama ? 'selected' : '' }}>
                                    {{ $dvs->nama }}
                                </option>
                            @empty
                                <option value="">Tidak Ada Divisi</option>
                            @endforelse
                        </select>
                    </div>
                    @error('divisi')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="jabatan" class="block text-sm font-semibold leading-6 text-gray-900">Jabatan <span
                            class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <select id="jabatan" name="jabatan"
                            class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none">
                            <option value="" selected>Pilih Jabatan Anda</option>
                            @forelse ($jabatan as $jab)
                                <option value="{{ $jab->nama }}"
                                    {{ old('jabatan') == $jab->nama ? 'selected' : '' }}>
                                    {{ $jab->nama }}
                                </option>
                            @empty
                                <option value="">Tidak Ada Jabatan</option>
                            @endforelse
                        </select>
                    </div>
                    @error('jabatan')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Detail Izin -->
                <div class="sm:col-span-2">
                    <label for="jenis_izin" class="block text-sm font-semibold leading-6 text-gray-900">Jenis
                        Izin <span class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <select id="jenis_izin" name="jenis_izin"
                            class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none">
                            <option value="">Pilih jenis izin</option>
                            @forelse ($jenis_izin as $value)
                                <option value="{{ $value->nama }}"
                                    {{ old('jenis_izin') == $value->nama ? 'selected' : '' }}>
                                    {{ $value->nama }}
                                </option>
                            @empty
                                <option value="">
                                    Tidak ada jenis izin
                                </option>
                            @endforelse
                        </select>
                    </div>
                    @error('jenis_izin')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="jam_pulang" class="block text-sm font-semibold leading-6 text-gray-900">Jam Pulang
                        Awal <span class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <input type="time" id="jam_pulang" name="jam_pulang_awal"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            value="{{ old('jam_pulang_awal') }}">
                    </div>
                    @error('jam_pulang_awal')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="tanggal_izin" class="block text-sm font-semibold leading-6 text-gray-900">Tanggal
                        Izin <span class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <input type="date" id="tanggal_izin" name="tanggal_izin"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            value="{{ old('tanggal_izin') }}">
                    </div>
                    @error('tanggal_izin')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Alasan -->
                <div class="sm:col-span-2">
                    <label for="alasan" class="block text-sm font-semibold leading-6 text-gray-900">Alasan <span
                            class="text-red-100">*</span></label>
                    <div class="mt-2.5">
                        <textarea id="alasan" name="alasan" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            placeholder="Masukkan alasan atau izin">{{ old('alasan') }}</textarea>
                    </div>
                    @error('alasan')
                        <span class="text-red-50 text-sm" style="font-style: italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-red-100 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-100">
                    Kirim
                </button>
            </div>
        </form>
    </div>
    {{-- Footer --}}
    <x-dashboard.footer></x-dashboard.footer>

    @if ($error_izin_karyawan = Session::get('error'))
        <script>
            Swal.fire({
                title: "Oops!",
                text: "{{ $error_izin_karyawan }}",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>
