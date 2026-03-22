@extends('layouts.femaster')

@section('content')
<div class="flex items-center justify-center min-h-[75vh] p-6 w-full">
    <div class="max-w-lg w-full bg-white dark:bg-background-dark rounded-3xl border border-primary/10 shadow-2xl overflow-hidden p-10 md:p-14 text-center relative">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-40 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col items-center gap-6">
            
            <div class="relative mt-4">
                <div class="size-24 bg-slate-50 dark:bg-slate-900/80 border-2 border-primary/20 rounded-full flex items-center justify-center text-primary shadow-lg shadow-primary/10 mb-2">
                    <span class="material-symbols-outlined text-6xl">sports</span>
                </div>
                <div class="absolute -bottom-1 -right-2 bg-red-500 w-8 h-10 rounded-sm border-2 border-white dark:border-background-dark shadow-md rotate-12"></div>
            </div>

            <div class="flex flex-col gap-2">
                <h1 class="text-7xl font-black text-slate-900 dark:text-white tracking-tighter">404</h1>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800 dark:text-slate-100 tracking-tight">Oops! That's an Offside.</h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2 max-w-sm mx-auto leading-relaxed">
                    It looks like you've wandered out of bounds. The pitch you are looking for doesn't exist, has been moved, or is temporarily unavailable.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-6 w-full">
                
                <button onclick="window.history.back()" class="w-full sm:w-auto flex items-center justify-center gap-2 h-12 px-6 rounded-lg border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-800 hover:border-primary hover:text-primary transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Go Back
                </button>
                
                <a href="{{ route('utils.home') }}" class="w-full sm:w-auto flex items-center justify-center gap-2 h-12 px-6 rounded-lg bg-primary text-background-dark text-sm font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <span class="material-symbols-outlined text-lg">home</span>
                    Back to Home
                </a>

            </div>
        </div>
    </div>
</div>
@endsection