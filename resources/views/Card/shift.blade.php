<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Shift Selection Cards</title>
    <link rel="shortcut icon" href="https://cdn.worldvectorlogo.com/logos/gt-r.svg" type="image/x-icon">
</head>

<body class="bg-black h-screen flex items-center justify-center">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-14 max-w-5xl w-full p-4">

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <img class="w-full h-60 object-cover" src="{{ asset('./image/src/beautiful_sunrise.jpg') }}"
                alt="Shift Pagi">
            <div class="p-4">
                <h2 class="text-xl font-bold">Shift Pagi</h2>
                <p class="text-gray-700 mt-2">dari pukul 08:00 hingga
                    16:00.</p>
            </div>
            <div class="p-4 border-t border-gray-200">
                <button class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800 w-full">Pilih Shift
                    Pagi</button>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <img class="w-full h-60 object-cover" src="{{ asset('./image/src/sunset.jpeg') }}" alt="Shift Sore">
            <div class="p-4">
                <h2 class="text-xl font-bold">Shift Sore</h2>
                <p class="text-gray-700 mt-2">Bekerja dari pukul 16:00 hingga
                    00:00.</p>
            </div>
            <div class="p-4 border-t border-gray-200">
                <button class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800 w-full">Pilih Shift
                    Sore</button>
            </div>
        </div>

    </div>

</body>

</html>
