<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Play CDN — swap for your compiled build.css if you already run Vite + Tailwind) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Poppins', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce',
                            800: '#6b21a8',
                            900: '#581c87',
                        },
                    },
                    boxShadow: {
                        card: '0 10px 30px -12px rgba(126, 34, 206, 0.25)',
                    },
                },
            },
        };
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-brand-50 text-slate-800 min-h-screen flex flex-col">

    <!-- Top Navigation -->
    <nav class="bg-gradient-to-r from-brand-700 via-brand-600 to-brand-500 shadow-lg">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('students.create') }}" class="flex items-center gap-2 text-white font-heading font-bold text-lg tracking-wide">
                <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white/15">🎓</span>
                Student Registration System
            </a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('students.create') }}" class="text-white/90 hover:text-white transition">Register</a>
                <a href="{{ route('students.index') }}" class="text-white/90 hover:text-white transition">All Students</a>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="max-w-4xl mx-auto w-full px-6 mt-6">
        @if (session('success'))
            <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-300 text-emerald-800 px-5 py-4 rounded-xl shadow-sm mb-4">
                <span class="text-xl leading-none">✅</span>
                <div>
                    <p class="font-semibold">Success</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="flex items-start gap-3 bg-rose-50 border border-rose-300 text-rose-800 px-5 py-4 rounded-xl shadow-sm mb-4">
                <span class="text-xl leading-none">⚠️</span>
                <div>
                    <p class="font-semibold">Please fix the following errors</p>
                    <ul class="text-sm list-disc list-inside mt-1 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <!-- Page Content -->
    <main class="flex-1 max-w-6xl mx-auto w-full px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-brand-100 mt-10">
        <div class="max-w-6xl mx-auto px-6 py-6 text-center text-sm text-slate-500">
            ITST 302 — Client-Server Technologies · Student Registration System &copy; {{ date('Y') }}
        </div>
    </footer>

</body>
</html>