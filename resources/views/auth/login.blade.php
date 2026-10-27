
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Portfolio</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh;
            display: grid; place-items: center;
            padding: 20px; color: #f8fafc;
            font-family: Arial, sans-serif;
            background: radial-gradient(circle at top left, #321725, transparent 40%), #080b14;
        }
        .login {
            width: 100%; max-width: 410px; padding: 32px;
            background: #111827; border: 1px solid #ffffff20;
            border-radius: 18px;
        }
        h1 { margin: 0 0 8px; }
        p { color: #9ca3af; margin-bottom: 25px; }
        label { display: block; margin: 15px 0 7px; }
        input {
            width: 100%; padding: 13px; border-radius: 8px;
            border: 1px solid #374151; background: #080b14;
            color: white; font-size: 15px;
        }
        button {
            width: 100%; margin-top: 22px; padding: 14px;
            border: 0; border-radius: 9px; color: white;
            font-weight: bold; cursor: pointer;
            background: linear-gradient(100deg, #ff465d, #ff8a35);
        }
        .error { color: #fda4af; font-size: 14px; }
        a { color: #fb7185; text-decoration: none; }
        .back { display: block; margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <main class="login">
        <h1>Admin <span style="color:#ff6477">Login</span></h1>
        <p>Sign in to access your portfolio dashboard.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <label for="email">Email address</label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="admin@example.com" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Enter your password" required>

            <button type="submit">Sign In →</button>
        </form>

        <a class="back" href="{{ url('/') }}">← Back to Portfolio</a>
    </main>
</body>
</html>
