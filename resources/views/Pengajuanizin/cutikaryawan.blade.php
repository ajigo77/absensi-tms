<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Cuti Karyawan</title>
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
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Form Pengajuan cuti tahunan</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Silakan isi form di bawah ini untuk mengambil hari cutimu!
            </p>
        </div>

        <form action="" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <!-- Informasi Karyawan -->
                <div>
                    <label for="nama" class="block text-sm font-semibold leading-6 text-gray-900">Nama
                        Karyawan</label>
                    <div class="mt-2.5">
                        <input type="text" id="nama" name="nama_karyawan" placeholder="Masukkan nama"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-dark-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            required>
                    </div>
                </div>

                <div>
                    <label for="divisi" class="block text-sm font-semibold leading-6 text-gray-900">Divisi</label>
                    <div class="mt-2.5">
                        <select id="divisi" name="divisi"
                            class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            required>
                            <option value="" selected>Pilih Divisi Anda</option>
                            @forelse ($divisi as $dvs)
                                <option value="{{ $dvs->id_divisi }}"
                                    {{ old('divisi_id') == $dvs->id_divisi ? 'selected' : '' }}>
                                    {{ $dvs->nama }}
                                </option>
                            @empty
                                <option value="">Tidak Ada Divisi</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="jabatan" class="block text-sm font-semibold leading-6 text-gray-900">Jabatan</label>
                    <div class="mt-2.5">
                        <select id="jabatan" name="jabatan"
                            class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            required>
                            <option value="" selected>Pilih Jabatan Anda</option>
                            @forelse ($jabatan as $jab)
                                <option value="{{ $jab->id_jabatan }}"
                                    {{ old('jabatan_id') == $jab->id_jabatan ? 'selected' : '' }}>
                                    {{ $jab->nama }}
                                </option>
                            @empty
                                <option value="">Tidak Ada Jabatan</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <!-- Detail Izin -->
                <div class="sm:col-span-2">
                    <div class="mt-2.5">
                        <label class="block text-sm font-semibold leading-6 text-gray-900">Mulai Cuti dari Tanggal:</label>
                        <input type="date" class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none" name="awal_cuti" required>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <div class="mt-2.5">
                        <label class="block text-sm font-semibold leading-6 text-gray-900">Sampai Tanggal</label>
                        <input type="date" class="block w-full rounded-md border-0 px-3.5 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none" name="akhir_cuti" required>
                    </div>
                </div>

                <!-- Alasan -->
                <div class="sm:col-span-2">
                    <label for="alasan" class="block text-sm font-semibold leading-6 text-gray-900">Alasan</label>
                    <div class="mt-2.5">
                        <textarea id="alasan" name="alasan" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-100 sm:text-sm sm:leading-6 focus:outline-none"
                            placeholder="Masukkan alasan atau izin" required></textarea>
                    </div>
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
</body>

</html>
