@extends('layouts.femaster')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white dark:bg-background-dark rounded-2xl border border-primary/10 shadow-xl overflow-hidden p-8">
        
        <div class="flex flex-col items-center text-center gap-2 mb-8">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Set New Password</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Please choose a strong password for your account.</p>
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-sm font-semibold text-slate-700 dark:text-slate-200">Email Address</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">mail</span>
                    <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required readonly
                        class="w-full h-11 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 cursor-not-allowed">
                </div>
                @error('email') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col gap-1.5 mt-2">
                <label for="password" class="text-sm font-semibold text-slate-700 dark:text-slate-200">New Password</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock</span>
                    <input type="password" name="password" id="password" required autofocus
                        class="w-full h-11 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
                @error('password') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="password_confirmation" class="text-sm font-semibold text-slate-700 dark:text-slate-200">Confirm New Password</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">lock_reset</span>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full h-11 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
            </div>

            <button type="submit" class="h-12 w-full mt-4 rounded-lg bg-primary text-background-dark text-base font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                Update Password
            </button>
        </form>

    </div>
</div>
@endsection