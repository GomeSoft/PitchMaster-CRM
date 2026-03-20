@extends('layouts.femaster')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center p-6">
        <div
            class="w-full max-w-md bg-white dark:bg-background-dark rounded-2xl border border-primary/10 shadow-xl overflow-hidden p-8">

            <div class="flex flex-col items-center text-center gap-2 mb-8">
                <div
                    class="size-12 bg-primary rounded-xl flex items-center justify-center text-background-dark mb-2 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-2xl font-bold">sports_soccer</span>
                </div>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Welcome Back</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Sign in to your PitchMaster CRM account</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
                @csrf

                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-semibold text-slate-700 dark:text-slate-200">Email</label>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">mail</span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="w-full h-12 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                            placeholder="admin@pitchmaster.com">
                    </div>
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="text-sm font-semibold text-slate-700 dark:text-slate-200">Password</label>
                        <a href="{{ route('password.request') }}"
                            class="text-xs font-bold text-primary hover:underline">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock</span>
                        <input type="password" name="password" id="password" required
                            class="w-full h-12 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-2 mt-1">
                    <input type="checkbox" name="remember" id="remember"
                        class="rounded border-slate-300 dark:border-slate-700 text-primary focus:ring-primary dark:bg-slate-900">
                    <label for="remember" class="text-sm text-slate-600 dark:text-slate-400">Remember me for 30 days</label>
                </div>

                <button type="submit"
                    class="h-12 w-full mt-2 rounded-lg bg-primary text-background-dark text-base font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-8">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-bold text-primary hover:underline">Sign up now</a>
            </p>

        </div>
    </div>
@endsection
