@extends('layouts.femaster')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white dark:bg-background-dark rounded-2xl border border-primary/10 shadow-xl overflow-hidden p-8">
        
        <div class="flex flex-col items-center text-center gap-2 mb-6">
            <div class="size-12 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-full flex items-center justify-center text-slate-600 dark:text-slate-300 mb-2">
                <span class="material-symbols-outlined text-2xl">key</span>
            </div>
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Reset Password</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Enter your email and we'll send you a link to reset your password.</p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 rounded-lg bg-primary/10 border border-primary/20 text-primary text-sm font-semibold text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="email" class="text-sm font-semibold text-slate-700 dark:text-slate-200">Email Address</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">mail</span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full h-12 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
                @error('email') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="h-12 w-full mt-2 rounded-lg bg-primary text-background-dark text-base font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                Send Reset Link
            </button>
        </form>

        <p class="text-center text-sm mt-8">
            <a href="{{ route('login') }}" class="flex items-center justify-center gap-1 font-bold text-slate-500 dark:text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-lg">arrow_back</span> Back to Login
            </a>
        </p>

    </div>
</div>
@endsection