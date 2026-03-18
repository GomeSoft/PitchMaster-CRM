@extends('layouts.femaster')

@section('content')
    <div class="relative px-6 md:px-20 py-12 md:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-8 md:flex-row items-center">
                <div class="flex flex-col gap-6 md:w-1/2 z-10">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider w-fit">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        Trusted by 500+ Clubs
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black leading-[1.1] tracking-tight text-slate-900 dark:text-white">
                        Manage Your <span class="text-primary">Football</span> Ecosystem
                    </h1>
                    <p class="text-base md:text-lg text-slate-600 dark:text-slate-400 max-w-[500px]">
                        The ultimate CRM for football leagues, clubs, and talent scouting. Streamline operations, track
                        performance, and discover the next star.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-2">
                        <button
                            class="flex h-12 px-8 cursor-pointer items-center justify-center rounded-lg bg-primary text-background-dark text-base font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                            Get Started Free
                        </button>
                        <button
                            class="flex h-12 px-8 cursor-pointer items-center justify-center rounded-lg border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-base font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                            Watch Demo
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 relative">
                    <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-slate-800 bg-slate-200 dark:bg-slate-800 relative group"
                        data-alt="Cinematic shot of a professional football stadium at night"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtE9yrSCFx3LVhn0SB6g7a1MZZe835Hqd3z_Xkio01pZL77W2lPmqKSvpAx_gQ7k7f6vEdLQ7Txv0ia_LS76FpkZ6tE6ENIQ-h8MTCx9lkYr9jBhU7O4zx1Cfhp9LDuojr86YXVa0PyM4QgUY5ao3QvPf8eDyD-o2iE5uXFEjmUh87R12P27ccGisp_4dJuN5Fj3E0WEHKv5NL1FaORxOi0VSt_BZF4g4yHfSJxYXdQlIzQabMvK3G3O6TYR7BizlRIF8GeHujS50"); background-size: cover; background-position: center;'>
                        <div class="absolute inset-0 bg-gradient-to-t from-background-dark/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center gap-4 text-white">
                            <div class="p-3 bg-primary rounded-full text-background-dark">
                                <span class="material-symbols-outlined">play_arrow</span>
                            </div>
                            <div>
                                <p class="font-bold">Real-time Analytics</p>
                                <p class="text-xs opacity-80">See how clubs are performing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
