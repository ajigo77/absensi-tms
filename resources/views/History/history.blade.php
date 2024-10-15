<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="overflow-y-hidden">
    <div class="h-screen">
        <div class="flex flex-col md:flex-row h-full">
            <!-- Card Profile -->
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <div class="bg-gray-100 rounded-lg h-full">
                    <div class="flex items-center p-4 bg-red-50">
                        <img class="w-16 h-16 rounded-full" src="https://via.placeholder.com/150" alt="Profile Picture">
                        <div class="ml-4">
                            <h2 class="text-xl text-white-100 font-semibold">Sevastopol</h2>
                            <p class="text-white-100">ID member: 2</p>
                        </div>
                    </div>
                    <div class="p-4 font-normal">
                        <p class="mb-2"><strong>Jabatan:</strong> test </p>
                        <p class="mb-2"><strong>Divisi:</strong> test </p>
                        <p class="mb-2"><!-- Isi konten di sini --> </p>
                    </div>
                </div>
            </div>

            <!-- Tabel History -->
            <div class="bg-white shadow-lg rounded-lg p-4 w-full h-full overflow-y-auto mt-8">
                <h2 class="text-2xl font-semibold mb-4">History</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead>
                            <tr class="bg-red-500 text-white">
                                <th class="py-2 px-4 border-b text-left">Tanggal</th>
                                <th class="py-2 px-4 border-b text-left">Kegiatan</th>
                                <th class="py-2 px-4 border-b text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 ">01/10/2023</td>
                                <td class="py-2 px-4 ">Kegiatan 1</td>
                                <td class="py-2 px-4 ">Selesai</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 ">02/10/2023</td>
                                <td class="py-2 px-4 ">Kegiatan 2</td>
                                <td class="py-2 px-4 ">Dalam Proses</td>
                            </tr>
                            <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
