<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('./image/src/hd-bd.jpg');
            background-size: cover;
            background-position: center;
            z-index: -100;
            position: relative;
            background-repeat: no-repeat;
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center">
    <div class="bg-white-100 p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <h2 class="text-center text-2xl font-bold text-gray-700 mb-6">Register</h2>

            <!-- Grid Layout for Two Columns -->
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Posisi/Divisi</label>
                        <input type="text" id="position" name="position"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                </div>
            </form>

            <!-- Register Button -->
            <div class="flex mt-8 text-center">
                <a href="" class="px-4 py-2 bg-red-50 text-white rounded-lg shadow-md hover:bg-red-100 w-full">
                    Register
                </a>
            </div>
        </div>
</body>

</html>
