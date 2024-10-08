<div class="flex items-center justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-14 max-w-5xl w-full p-4 mt-16">
        <!-- Add margin-top to avoid content overlap -->
        <div class="bg-white-100 rounded-2xl shadow-md overflow-hidden">
            <img class="w-full h-60 object-cover" src="{{ asset('./image/src/beautiful_sunrise.jpg') }}" alt="Shift Pagi">
            <div class="p-4">
                <h2 class="text-xl font-bold">Absen Pagi</h2>
                <p class="text-gray-700 mt-2">dari pukul 08:00 hingga 16:00.</p>
            </div>
            <div class="p-4 border-t border-gray-200">
                <a href="{{ route('absensi.karyawan') }}">
                    <button class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800 w-full">
                        Pilih Shift Pagi
                    </button>
                </a>
            </div>
            <div id="lokasi"></div>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <img class="w-full h-60 object-cover" src="{{ asset('./image/src/sunset.jpeg') }}" alt="Shift Sore">
            <div class="p-4">
                <h2 class="text-xl font-bold">Absen Sore</h2>
                <p class="text-gray-700 mt-2">Bekerja dari pukul 16:00 hingga 00:00.</p>
            </div>
            <div class="p-4 border-t border-gray-200">
                <a href="#">
                    <button class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800 w-full">
                        Pilih Shift Sore
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
