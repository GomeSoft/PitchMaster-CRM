@extends('layouts.femaster')

@section('content')
    <div class="p-6 md:p-10 max-w-7xl mx-auto w-full">
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 overflow-hidden shadow-sm">

            <div class="p-4 border-b border-primary/5 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">Professional Leagues</h3>
                <div class="flex items-center gap-2">
                    <span class="text-slate-400 text-xs font-medium">View:</span>
                    <button class="p-1.5 rounded bg-primary/10 text-primary hover:bg-primary/20 transition-colors">
                        <span class="material-symbols-outlined text-lg">format_list_bulleted</span>
                    </button>
                    <button
                        class="p-1.5 rounded text-slate-400 hover:text-primary hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-lg">grid_view</span>
                    </button>
                    <a href="{{ route('leagues.create') }}">
                        <button
                            class="p-1.5 rounded text-slate-400 hover:text-primary hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg">Add League</span>
                        </button>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-900/50 border-b border-primary/5">
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest w-20">Logo</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">League Name
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Country</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center w-32">
                                Teams</th>
                            <!--<th
                                class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right w-24">
                                Action</th>-->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        @foreach ($leagues as $league)
                            <tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-slate-50 dark:bg-slate-900 p-1 rounded-full w-12 h-12 flex items-center justify-center border border-primary/5">
                                        <span class="material-symbols-outlined text-primary">{{ $league->logo }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="font-bold text-slate-900 dark:text-slate-100 group-hover:text-primary transition-colors">{{ $league->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-sm">{{ $league->country }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center justify-center px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold">
                                        {{ $totalTeams}}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-primary/5 flex items-center justify-between bg-slate-50/50 dark:bg-slate-900/30">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-widest">Showing {{ $totalTeams }} of {{ $totalTeams }} Leagues</p>
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
