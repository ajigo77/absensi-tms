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
    <div class="bg-white-100 p-8 rounded-xl shadow-lg w-full max-w-md absolute z-100">
        <h2 class="text-2xl font-bold text-dark-100 mb-6 text-center">Login</h2>

        <!-- Input fields -->
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-dark-50">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 p-2 block w-full border border-dark-50 rounded-md shadow-sm focus:ring-blue-500 focus:border-red-50"
                    required>
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-dark-50">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 p-2 block w-full border border-dark-50 rounded-md shadow-sm focus:ring-blue-500 focus:border-red-50"
                    required>
            </div>
            <div class="flex justify-between items-center">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-4 w-4 accent-red-50">
                    <span class="ml-2 text-sm text-dark-50 text-capitalize">Ingatkan Saya</span>
                </label>
                <a href="{{ route('auth.register') }}" class="text-sm text-dark-50 hover:underline">Belum punya akun?</a>
            </div>
            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-red-50 text-white py-2 rounded-lg hover:bg-red-50 transition duration-300 font-bold text-white-100">
                Login
            </button>
            <span class="flex text-center justify-center text-dark text-sm">Atau</span>
            <!-- Login with Google Button -->
            <button type="button"
                class="w-full bg-gray-100 text-dark-50 py-2 rounded-lg hover:bg-gray-50 transition duration-300 mt-4 flex items-center justify-center">
                <img src="./image/src/google.png" class="h-5 w-5 mr-2" alt="Google Logo">
                Login with Google
            </button>
        </form>
    </div>
</body>

</html>
