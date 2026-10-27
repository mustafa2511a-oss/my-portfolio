<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-4">

    <div class="bg-gray-800 p-8 rounded-xl border border-gray-700 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-red-500 mb-6">Admin Login</h2>

        @if($errors->any())
            <div class="bg-red-600/20 border border-red-500 text-red-400 p-3 rounded mb-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
    @csrf
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" required placeholder="admin@portfolio.com" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-red-500">
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded transition">Login</button>
        </form>
    </div>

</body>
</html>