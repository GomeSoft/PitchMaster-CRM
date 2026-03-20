@extends('layouts.femaster')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="p-6 md:p-10 max-w-4xl mx-auto w-full">
        @if (Auth::user()->role == \App\Models\User::TYPE_ADMIN)
            <div class="flex items-center justify-between mb-8">
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Team:
                        {{ $team->name }}</h2>
                    <p class="text-slate-500 dark:text-slate-400">Update the information for this football club.</p>
                </div>
                <a href="{{ route('teams.index') }}"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-800 text-sm font-bold text-slate-600 dark:text-slate-300 hover:border-primary hover:text-primary transition-all">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Back to Teams
                </a>
            </div>

            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data"
                class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 overflow-hidden shadow-sm">
                @csrf
                @method('PUT')

                <div class="p-6 border-b border-primary/5 bg-slate-50/50 dark:bg-slate-900/30">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary p-2 rounded-lg bg-primary/10">edit</span>
                        Team Details
                    </h3>
                </div>

                <div class="p-6 md:p-8 flex flex-col gap-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="flex flex-col gap-2">
                            <label for="league_id" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                                League <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">emoji_events</span>
                                <select name="league_id" id="league_id" required
                                    class="w-full h-12 pl-11 pr-10 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all appearance-none cursor-pointer">
                                    <option value="" disabled>Select League</option>
                                    @foreach ($leagues as $league)
                                        <option value="{{ $league->league_id }}"
                                            {{ old('league_id', $team->league_id) == $league->league_id ? 'selected' : '' }}>
                                            {{ $league->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                            </div>
                            @error('league_id')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="name" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Team Name <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">sports_soccer</span>
                                <input value="{{ old('name', $team->name) }}" type="text" name="name" id="name"
                                    required
                                    class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                            </div>
                            @error('name')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="country" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Country <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">public</span>
                                <input value="{{ old('country', $team->country) }}" type="text" name="country"
                                    id="country" required
                                    class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                            </div>
                            @error('country')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="stadium" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Stadium Name <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">stadium</span>
                                <input value="{{ old('stadium', $team->stadium) }}" type="text" name="stadium"
                                    id="stadium" required
                                    class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                            </div>
                            @error('stadium')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="founded_date" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Year Founded <span class="text-primary">*</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">calendar_today</span>
                                <input value="{{ old('founded_date', $team->founded_date) }}" type="number"
                                    name="founded_date" id="founded_date" min="1800" max="2099" required
                                    class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                            </div>
                            @error('founded_date')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-slate-100 dark:border-slate-800">

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Team Badge (Logo)
                        </label>
                        <div
                            class="flex items-center gap-5 p-5 rounded-lg border-2 border-dashed border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 hover:border-primary/50 transition-colors group">

                            <div
                                class="size-20 rounded-full bg-white dark:bg-slate-800 border border-primary/10 flex items-center justify-center overflow-hidden">
                                @if ($team->badge)
                                    <img src="{{ asset('storage/' . $team->badge) }}" alt="{{ $team->name }}"
                                        class="size-full object-contain p-2">
                                @else
                                    <span class="material-symbols-outlined text-4xl text-slate-400">local_police</span>
                                @endif
                            </div>

                            <div class="flex flex-col gap-2 flex-1">
                                <label for="badge"
                                    class="w-fit cursor-pointer px-4 py-2 rounded-lg bg-slate-200 dark:bg-slate-800 text-sm font-bold text-slate-800 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors">
                                    Change Image
                                    <input type="file" name="badge" id="badge" accept="image/*" class="hidden">
                                </label>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Leave blank to keep the current badge.
                                    Max 2MB.</p>
                            </div>
                        </div>
                        @error('badge')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div
                    class="p-6 border-t border-primary/5 bg-slate-50/50 dark:bg-slate-900/30 flex items-center justify-end gap-3">
                    <button type="submit"
                        class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-background-dark text-sm font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                        <span class="material-symbols-outlined text-lg">save</span>
                        Save Changes
                    </button>
                </div>
            </form>
        @else
            <h1>Não és um administrador, não tens permissão para aceder esta página.</h1>
        @endif
    </div>
@endsection
