@extends('layouts.femaster')
@section('content')
    <div class="p-6 md:p-10 max-w-7xl mx-auto w-full">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="p-6 md:p-10 max-w-7xl mx-auto w-full">
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 overflow-hidden shadow-sm">

            <div class="p-4 border-b border-primary/5 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">Participating Teams</h3>
                <div class="flex flex-wrap items-center justify-end gap-4 mb-6">

                    <div id="search-form" class="flex items-center w-full sm:w-auto">
                        <form action="{{ url()->current() }}" method="GET" class="flex w-full items-center gap-2">

                            <div class="relative flex items-center w-full sm:w-64 md:w-80">
                                <span
                                    class="material-symbols-outlined absolute left-3 text-slate-400 text-lg pointer-events-none">
                                    search
                                </span>

                                <input type="text" name="search" placeholder="Search leagues..."
                                    value="{{ request()->query('search') }}"
                                    class="w-full h-10 pl-10 pr-10 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-sm text-slate-900 dark:text-slate-100 placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">

                                @if (request()->query('search'))
                                    <a href="{{ url()->current() }}"
                                        class="absolute right-3 flex items-center text-slate-400 hover:text-red-500 transition-colors"
                                        title="Clear search">
                                        <span class="material-symbols-outlined text-lg">close</span>
                                    </a>
                                @endif
                            </div>

                            <button type="submit"
                                class="hidden sm:flex items-center justify-center h-10 px-4 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-sm font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                                Search
                            </button>
                        </form>
                    </div>
                    @if (Auth::user()->role ==  \App\Models\User::TYPE_ADMIN)
                        <a href="{{ route('teams.create') }}"
                            class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg bg-primary text-background-dark text-sm font-bold shadow-md shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all w-full sm:w-auto">
                            <span class="material-symbols-outlined text-lg">add_circle</span>
                            Add Team
                        </a>
                    @endif

                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-900/50 border-b border-primary/5">
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest w-20">Badge</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Team Name</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Stadium</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center w-32">
                                Founded</th>
                            @if (Auth::user()->role ==  \App\Models\User::TYPE_ADMIN)
                                <th
                                    class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right w-24">
                                    Actions</th>
                            @endif

                        </tr>

                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        @foreach ($teams as $team)
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-slate-50 dark:bg-slate-900 p-1 rounded-full w-12 h-12 flex items-center justify-center border border-primary/5">
                                        <div class="bg-center bg-no-repeat bg-contain size-8"
                                            data-alt="Arsenal football club badge"
                                            style='background-image: url("{{ $team->badge }}");'>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-primary transition-colors">{{ $team->name }}</span>
                                        <span class="text-xs text-slate-400">{{ $team->country }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-sm">stadium</span>
                                        {{ $team->stadium }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="text-slate-600 dark:text-slate-400 font-medium">{{ $team->founded_date }}</span>
                                </td>
                                @if (Auth::user()->role ==  \App\Models\User::TYPE_ADMIN)
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('teams.update', $team->id) }}"
                                            class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">
                                            <span class="material-symbols-outlined">edit</span>
                                        </a>
                                        <a href="{{ route('teams.delete', $team->id) }}"
                                            class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-primary/5 flex items-center justify-between bg-slate-50/50 dark:bg-slate-900/30">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-widest">Showing 6 of 20 Teams</p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-bold text-slate-500 hover:border-primary hover:text-primary transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">Previous</button>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-bold text-slate-500 hover:border-primary hover:text-primary transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">Next</button>
                </div>
            </div>

        </div>
    </div>
@endsection
