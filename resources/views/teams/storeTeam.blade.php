@extends('layouts.femaster')

@section('content')
    <div class="p-6 md:p-10 max-w-4xl mx-auto w-full">

        <div class="flex items-center justify-between mb-8">
            <div class="flex flex-col gap-1">
                <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-900 dark:text-white">Add New Team</h2>
                <p class="text-slate-500 dark:text-slate-400">Register a new football club to the platform.</p>
            </div>
            <a href="{{ route('teams.index') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-800 text-sm font-bold text-slate-600 dark:text-slate-300 hover:border-primary hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
                Back to Teams
            </a>
        </div>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 overflow-hidden shadow-sm">
            @csrf
            <div class="p-6 border-b border-primary/5 bg-slate-50/50 dark:bg-slate-900/30">
                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary p-2 rounded-lg bg-primary/10">shield</span>
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
                                class="w-full h-12 pl-11 pr-10 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all appearance-none cursor-pointer">
                                <option value="" disabled {{ old('league_id') ? '' : 'selected' }}>Select League
                                </option>
                                @foreach ($leagues as $league)
                                    <option value="{{ $league->league_id }}"
                                        {{ old('league_id') == $league->league_id ? 'selected' : '' }}>
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
                            <input value="{{ old('name') }}" type="text" name="name" id="name" required
                                class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="e.g. Arsenal FC">
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
                            <input value="{{ old('country') }}" type="text" name="country" id="country" required
                                class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="e.g. England">
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
                            <input value="{{ old('stadium') }}" type="text" name="stadium" id="stadium" required
                                class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="e.g. Emirates Stadium">
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
                            <input value="{{ old('founded_date') }}" type="number" name="founded_date" id="founded_date"
                                min="1800" max="2099" required
                                class="w-full h-12 pl-11 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="e.g. 1886">
                        </div>
                        @error('founded_date')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <hr class="border-slate-100 dark:border-slate-800">

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                        Team Badge (Logo) <span class="text-primary">*</span>
                    </label>

                    <div
                        class="flex items-center gap-5 p-5 rounded-lg border-2 border-dashed border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50 hover:border-primary/50 transition-colors group">
                        <div
                            class="size-20 rounded-full bg-white dark:bg-slate-800 border border-primary/10 flex items-center justify-center text-slate-400 dark:text-slate-600 group-hover:text-primary transition-colors overflow-hidden">
                            <span class="material-symbols-outlined text-4xl">local_police</span>
                        </div>

                        <div class="flex flex-col gap-2 flex-1">
                            <label for="badge"
                                class="w-fit cursor-pointer px-4 py-2 rounded-lg bg-slate-200 dark:bg-slate-800 text-sm font-bold text-slate-800 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors">
                                Choose Image
                                <input type="file" name="badge" id="badge" accept="image/*" class="hidden">
                            </label>
                            <p class="text-xs text-slate-500 dark:text-slate-400">PNG, JPG or SVG transparent backgrounds
                                recommended. Max 2MB.</p>
                        </div>
                    </div>
                    @error('badge')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div
                class="p-6 border-t border-primary/5 bg-slate-50/50 dark:bg-slate-900/30 flex items-center justify-end gap-3">
                <button type="reset"
                    class="px-5 py-2.5 rounded-lg text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    Reset Form
                </button>
                <button type="submit"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-background-dark text-sm font-black shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Register Team
                </button>
            </div>

        </form>
    </div>
@endsection
