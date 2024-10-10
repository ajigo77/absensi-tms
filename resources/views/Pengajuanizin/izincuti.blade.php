<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="/path/to/jquery.signaturepad.css" rel="stylesheet" />
    <title>Izin Karyawan</title>
    <style>
        #signatureCanvas {
            border: 1px solid #ccc;
            touch-action: none;
            /* Prevent touch scrolling on mobile */
        }
    </style>
</head>

<body class="flex flex-col h-screen">
    <nav class="bg-red-400 shadow-md">
        <div class="max-w-full mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="text-xl font-bold">Kembali</div>
                <div class="hidden md:flex space-x-4"></div>
                <div class="md:hidden">
                    <button id="menu-button" class="text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex-grow mx-auto bg-white p-6 shadow-lg w-full overflow-auto">
        <h1 class="text-2xl font-bold text-center mb-6">Form Pengajuan Cuti Tahunan</h1>

        <form>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Bagian 1: Informasi Karyawan -->
                <div class="md:col-span-1">
                    <h2 class="text-lg font-semibold mb-2">Informasi Karyawan</h2>
                    <label class="block mb-2">Nama Karyawan:</label>
                    <input type="text" class="border rounded w-full p-2" placeholder="Masukkan nama" required>

                    <label class="block mb-2 mt-4">Divisi:</label>
                    <select class="border rounded w-full p-2" required>
                        <option value="">Pilih Divisi Anda</option>
                        <option value="sdm">SDM</option>
                        <option value="umb">UMB</option>
                        <option value="ack">ACK</option>
                        <option value="its">ITS</option>
                        <option value="rpu">RPU</option>
                        <option value="mpj">MPJ</option>
                    </select>

                    <label class="block mb-2 mt-4">Jabatan:</label>
                    <input type="text" class="border rounded w-full p-2" placeholder="Masukkan jabatan" required>
                </div>

                <!-- Bagian 2: Detail Izin -->
                <div class="md:col-span-1">
                    <h2 class="text-lg font-semibold mb-2">Detail Izin</h2>
                    <label class="block mb-2">Mulai Cuti Pada Tanggal:</label>
                    <input type="date" class="border rounded w-full p-2" required>
                    <label class="block mb-2 mt-3">Sampai Tanggal</label>
                    <input type="date" class="border rounded w-full p-2" required>
                </div>

                <!-- Bagian 3: Alasan -->
                <div class="md:col-span-1">
                    <h2 class="text-lg font-semibold mb-10">Alasan / Kepentingan:</h2>
                    <textarea class="border rounded w-full p-2 mb-4 max-h-48" rows="4" placeholder="Masukkan alasan izin" required></textarea>
                </div>
            </div>
        </form>

        <div class="flex flex-col justify-start mb-4">
            <label class="block mb-2 mt-4">Tanda Tangan Karyawan:</label>
            <div class="flex justify-start mb-4">
                <canvas id="signatureCanvas" class="w-full md:w-1/2 h-40 border border-gray-300"></canvas>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-start gap-5 mt-2">
            <button type="button" id="clearButton"
                class="bg-red-500 text-white rounded px-4 py-2 mb-2 md:mb-0">Clear</button>
            <button class="bg-blue-500 text-white rounded px-4 py-2">Kirim</button>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/path/to/cdn/jquery.min.js"></script>

    <!-- json2.js -->
    <script src="/path/to/json2.min.js"></script>

    <!-- signature pad -->
    <script src="/path/to/jquery.signaturepad.js"></script>

    <!-- for IE -->
    <!--[if lt IE 9]>
  <script src="/path/to/flashcanvas.js"></script>
<![endif]-->
</body>

</html>
