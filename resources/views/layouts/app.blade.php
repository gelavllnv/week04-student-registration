<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration Portal')</title>

    <!-- Google Fonts: Space Grotesk (display) + Inter (body) + IBM Plex Mono (data) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Space Grotesk"', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                        mono: ['"IBM Plex Mono"', 'monospace'],
                    },
                    colors: {
                        ink: {
                            950: '#0D0817',
                            900: '#150E24',
                            800: '#1D1530',
                            700: '#291F42',
                            600: '#382C57',
                            500: '#4B3B71',
                        },
                        violet: {
                            400: '#A78BFA',
                            500: '#8B5CF6',
                            600: '#7C3AED',
                            700: '#6D28D9',
                        },
                        gold: {
                            300: '#F0DA9A',
                            400: '#E8C468',
                            500: '#D4AF37',
                        },
                    },
                    boxShadow: {
                        glow: '0 0 0 1px rgba(139,92,246,0.15), 0 20px 60px -15px rgba(124,58,237,0.45)',
                        goldglow: '0 0 0 1px rgba(212,175,55,0.25), 0 8px 24px -8px rgba(212,175,55,0.35)',
                    },
                    backgroundImage: {
                        mesh: 'radial-gradient(60% 50% at 15% 10%, rgba(124,58,237,0.35) 0%, rgba(124,58,237,0) 60%), radial-gradient(50% 40% at 90% 0%, rgba(212,175,55,0.15) 0%, rgba(212,175,55,0) 60%), radial-gradient(70% 60% at 50% 100%, rgba(76,29,149,0.35) 0%, rgba(76,29,149,0) 60%)',
                    },
                },
            },
        };
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono-tag { font-family: 'IBM Plex Mono', monospace; letter-spacing: 0.02em; }
        ::selection { background: rgba(139,92,246,0.35); }
        .glass {
            background: rgba(29, 21, 48, 0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }
        input:focus, select:focus, textarea:focus { outline: none; }
    </style>
</head>
<body class="bg-ink-950 text-slate-200 min-h-screen bg-mesh bg-fixed">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="hidden lg:flex flex-col w-64 shrink-0 border-r border-ink-700/60 bg-ink-900/70 backdrop-blur-xl">
        <div class="h-20 flex items-center gap-3 px-6 border-b border-ink-700/60">
            <div class="w-9 h-9 flex items-center justify-center shadow-glow">
                <img src="{{ asset('images/citlogo.png') }}" 
                alt="Registrar Logo" 
                class="w-9 h-9 object-contain">
            </div>
            <div class="leading-tight">
                <p class="font-display font-semibold text-white text-sm">Registration Portal</p>
                <p class="text-[11px] text-slate-400 font-mono-tag">College of IT</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <p class="px-3 text-[11px] uppercase tracking-widest text-slate-500 font-semibold mb-2">Registration</p>
            <a href="{{ route('students.create') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('students.create') ? 'bg-violet-600/20 text-white border border-violet-500/40' : 'text-slate-400 hover:text-white hover:bg-ink-800' }}">
                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('students.create') ? 'bg-gold-400' : 'bg-slate-600' }}"></span>
                New Registration
            </a>
            <a href="{{ route('students.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('students.index') ? 'bg-violet-600/20 text-white border border-violet-500/40' : 'text-slate-400 hover:text-white hover:bg-ink-800' }}">
                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('students.index') ? 'bg-gold-400' : 'bg-slate-600' }}"></span>
                Student Records
            </a>
        </nav>

        <div class="p-4 m-4 rounded-xl border border-ink-700/60 bg-ink-800/60">
            <p class="text-[11px] uppercase tracking-widest text-gold-400 font-semibold font-mono-tag">System</p>
            <p class="text-xs text-slate-400 mt-1.5 leading-relaxed">Laravel-powered student intake for the College of Information Technology.</p>
        </div>
    </aside>

    <!-- Main column -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- Topbar -->
        <header class="h-20 flex items-center justify-between px-6 lg:px-10 border-b border-ink-700/60 bg-ink-900/50 backdrop-blur-xl">
            <div class="flex items-center gap-2 text-sm text-slate-400">
                <span class="font-display text-white font-semibold text-base">@yield('page_title', 'Registration')</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden sm:inline-flex items-center gap-1.5 text-xs font-mono-tag text-slate-400 bg-ink-800 border border-ink-700 px-3 py-1.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    System Online
                </span>
            </div>
        </header>

        <!-- Flash messages -->
        <div class="px-6 lg:px-10 pt-6">
            @if (session('success'))
                <div class="flex items-start gap-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 px-5 py-4 rounded-xl mb-5">
                    <span class="text-lg leading-none mt-0.5">✓</span>
                    <div>
                        <p class="font-semibold text-emerald-200 font-display text-sm">Registration Successful</p>
                        <p class="text-sm text-emerald-300/90 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex items-start gap-3 bg-rose-500/10 border border-rose-500/30 text-rose-300 px-5 py-4 rounded-xl mb-5">
                    <span class="text-lg leading-none mt-0.5">!</span>
                    <div>
                        <p class="font-semibold text-rose-200 font-display text-sm">Please correct the following</p>
                        <ul class="text-sm text-rose-300/90 list-disc list-inside mt-1 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <!-- Page content -->
        <main class="flex-1 px-6 lg:px-10 pb-12">
            @yield('content')
        </main>

        <footer class="px-6 lg:px-10 py-6 text-center text-xs text-slate-600 font-mono-tag border-t border-ink-700/60">
            ITST 302 · Client-Server Technologies — Student Registration Portal
        </footer>
    </div>
</div>
</body>
</html>