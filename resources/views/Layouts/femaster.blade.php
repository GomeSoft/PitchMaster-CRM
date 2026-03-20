<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#11d411",
                        "background-light": "#f6f8f6",
                        "background-dark": "#102210",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <title>Football CRM - Management Platform</title>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">

            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/10 px-6 md:px-20 py-4 bg-white dark:bg-background-dark/50 backdrop-blur-md sticky top-0 z-50">
                <a href="{{ route('utils.home') }}">
                    <div class="flex items-center gap-3 text-slate-900 dark:text-slate-100">
                        <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-background-dark">
                            <span class="material-symbols-outlined font-bold">sports_soccer</span>
                        </div>
                        <h2 class="text-xl font-bold leading-tight tracking-tight">PitchMaster CRM</h2>
                    </div>
                </a>
                <div class="flex flex-1 justify-end gap-4 md:gap-8 items-center">
                    <nav class="hidden md:flex items-center gap-6">
                        <a class="text-sm font-semibold hover:text-primary transition-colors"
                            href="{{ route('utils.home') }}">Home</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors"
                            href="{{ route('leagues.index') }}">Leagues</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors"
                            href="{{ route('teams.index') }}">Teams</a>
                    </nav>
                    @if (Route::has('login'))
                        <div class="flex gap-3">
                            @auth
                                @if (Auth::user()->role ==  \App\Models\User::TYPE_ADMIN)
                                    <a href="{{ route('dashboard.index') }}">
                                        <button
                                            class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold transition-all hover:opacity-90">
                                            <span>Dashboard</span>
                                        </button>
                                    </a>
                                @endif

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold transition-all hover:opacity-90">
                                        <span>Logout</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-100 text-sm font-bold transition-all hover:bg-slate-200">
                                    <span>Login</span>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold transition-all hover:opacity-90">
                                        <span>Register</span>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </header>

            <main class="flex flex-col flex-1">

                @yield('content')

            </main>

            <footer
                class="bg-white dark:bg-background-dark border-t border-slate-100 dark:border-slate-800 px-6 md:px-20 py-12">
                <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
                    <div class="flex flex-col gap-4 col-span-1 md:col-span-1">
                        <div class="flex items-center gap-3 text-slate-900 dark:text-slate-100">
                            <div
                                class="size-6 bg-primary rounded flex items-center justify-center text-background-dark">
                                <span class="material-symbols-outlined text-xs font-bold">sports_soccer</span>
                            </div>
                            <h2 class="text-lg font-bold leading-tight">PitchMaster</h2>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            The world's leading football management software for professional organizations.
                        </p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Product</h4>
                        <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                            <li class="hover:text-primary cursor-pointer">Features</li>
                            <li class="hover:text-primary cursor-pointer">Scouting Tool</li>
                            <li class="hover:text-primary cursor-pointer">League Sync</li>
                            <li class="hover:text-primary cursor-pointer">API Access</li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Company</h4>
                        <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                            <li class="hover:text-primary cursor-pointer">About Us</li>
                            <li class="hover:text-primary cursor-pointer">Careers</li>
                            <li class="hover:text-primary cursor-pointer">Press</li>
                            <li class="hover:text-primary cursor-pointer">Contact</li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h4 class="font-bold text-slate-900 dark:text-white">Legal</h4>
                        <ul class="flex flex-col gap-2 text-sm text-slate-500 dark:text-slate-400">
                            <li class="hover:text-primary cursor-pointer">Privacy Policy</li>
                            <li class="hover:text-primary cursor-pointer">Terms of Service</li>
                            <li class="hover:text-primary cursor-pointer">Cookie Settings</li>
                        </ul>
                    </div>
                </div>
                <div
                    class="max-w-7xl mx-auto border-t border-slate-100 dark:border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-400">
                    <p>© 2024 PitchMaster CRM. All rights reserved.</p>
                    <div class="flex gap-6">
                        <span class="material-symbols-outlined cursor-pointer hover:text-primary">public</span>
                        <span class="material-symbols-outlined cursor-pointer hover:text-primary">share</span>
                        <span class="material-symbols-outlined cursor-pointer hover:text-primary">mail</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</body>

</html>
