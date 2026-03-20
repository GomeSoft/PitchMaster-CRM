@extends('layouts.femaster') 
@section('content')
    <div class="p-6 md:p-10 max-w-7xl mx-auto w-full">

        <div class="flex flex-col gap-1 mb-10">
            <h1 class="text-3xl md:text-4xl font-black leading-tight tracking-tight text-slate-900 dark:text-white">
                Dashboard de {{ Auth::user()->name }}
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400">
                Welcome to PitchMaster CRM. Here is an overview of your football ecosystem.
            </p>

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">

            <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-primary/10 shadow-sm flex items-center gap-6">
                <div
                    class="size-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center border border-primary/20">
                    <span class="material-symbols-outlined text-4xl">emoji_events</span>
                </div>
                <div class="flex flex-col">
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total
                        Leagues</p>
                    <p class="text-4xl font-black text-slate-900 dark:text-white">
                        {{ $totalLeagues ?? '0' }}
                    </p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-background-dark p-6 rounded-xl border border-primary/10 shadow-sm flex items-center gap-6">
                <div
                    class="size-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center border border-primary/20">
                    <span class="material-symbols-outlined text-4xl">shield</span>
                </div>
                <div class="flex flex-col">
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Teams
                    </p>
                    <p class="text-4xl font-black text-slate-900 dark:text-white">
                        {{ $totalTeams ?? '0' }}
                    </p>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-6">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Quick Actions</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                <a href="{{ route('teams.index') }}"
                    class="group bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-100 dark:border-slate-800 hover:border-primary transition-all flex flex-col gap-3 shadow-sm hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="flex items-center gap-3 text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                        <span
                            class="material-symbols-outlined p-2 rounded-lg bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">groups</span>
                        <h4 class="font-bold text-lg">Manage Teams</h4>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">View, edit, or delete registered football clubs.
                    </p>
                    <span
                        class="material-symbols-outlined text-primary self-end mt-2 opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                </a>

                <a href="{{ route('leagues.index') }}"
                    class="group bg-white dark:bg-background-dark p-6 rounded-xl border border-slate-100 dark:border-slate-800 hover:border-primary transition-all flex flex-col gap-3 shadow-sm hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="flex items-center gap-3 text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                        <span
                            class="material-symbols-outlined p-2 rounded-lg bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">emoji_events</span>
                        <h4 class="font-bold text-lg">Manage Leagues</h4>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Overview of all competitions and tiers.</p>
                    <span
                        class="material-symbols-outlined text-primary self-end mt-2 opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                </a>

                <a href="{{ route('teams.create') }}"
                    class="group bg-primary text-background-dark p-6 rounded-xl transition-all flex flex-col gap-3 shadow-lg shadow-primary/10 hover:shadow-primary/20 hover:-translate-y-1">
                    <div class="flex items-center gap-3 font-bold text-lg">
                        <span class="material-symbols-outlined p-2 rounded-lg bg-background-dark/10">shield</span>
                        <h4>Add Team</h4>
                    </div>
                    <p class="text-sm opacity-90">Register a new club to the ecosystem.</p>
                    <span class="material-symbols-outlined self-end mt-2">add</span>
                </a>

                <a href="{{ route('leagues.create') }}"
                    class="group bg-primary text-background-dark p-6 rounded-xl transition-all flex flex-col gap-3 shadow-lg shadow-primary/10 hover:shadow-primary/20 hover:-translate-y-1">
                    <div class="flex items-center gap-3 font-bold text-lg">
                        <span class="material-symbols-outlined p-2 rounded-lg bg-background-dark/10">add_circle</span>
                        <h4>Add League</h4>
                    </div>
                    <p class="text-sm opacity-90">Setup a new competition or division.</p>
                    <span class="material-symbols-outlined self-end mt-2">add</span>
                </a>

            </div>
        </div>

        @if (Auth::check() && Auth::user()->role == \App\Models\User::TYPE_ADMIN)
    <div class="mt-12 flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight">User Management</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Manage platform access and administrator roles.</p>
            </div>
            <div class="hidden sm:flex items-center relative">
                <span class="material-symbols-outlined absolute left-3 text-slate-400 text-lg">search</span>
                <input type="text" placeholder="Search users..." class="h-10 pl-10 pr-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-sm focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all w-64">
            </div>
        </div>

        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-900/50 border-b border-primary/5">
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">User</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Role</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Joined Date</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        
                        @foreach ($users as $user)
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="size-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 dark:text-slate-400 border border-slate-200 dark:border-slate-700">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-900 dark:text-slate-100">{{ $user->name }}</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if ($user->role == \App\Models\User::TYPE_ADMIN)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold">
                                        <span class="material-symbols-outlined text-[14px]">shield_person</span>
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold">
                                        <span class="material-symbols-outlined text-[14px]">person</span>
                                        User
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-center text-sm text-slate-600 dark:text-slate-400">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    
                                    @if (Auth::id() !== $user->id)
                                        
                                        @if ($user->role !== \App\Models\User::TYPE_ADMIN)
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST" onsubmit="return confirm('Promote this user to Administrator?');">
                                            @csrf
                                            @method('post')
                                            <button type="submit" title="Make Admin" class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50 flex items-center justify-center">
                                                <span class="material-symbols-outlined">admin_panel_settings</span>
                                            </button>   
                                        </form>
                                        @else
                                        <form action="{{ route('users.remove-admin', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this user from admin? This action cannot be undone.');">
                                            @csrf
                                            @method('post')
                                            <button type="submit" title="Remove Admin" class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50 flex items-center justify-center">
                                                <span class="material-symbols-outlined">admin_panel_settings</span>
                                            </button>   
                                        </form>
                                        @endif

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete User" class="p-2 rounded-lg text-slate-400 hover:text-red-500 hover:bg-red-500/10 transition-all focus:outline-none focus:ring-2 focus:ring-red-500/50 flex items-center justify-center">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>

                                    @else
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest pr-2">You</span>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            
            @if(method_exists($users, 'links') && $users->hasPages())
            <div class="px-6 py-4 border-t border-primary/5 bg-slate-50/50 dark:bg-slate-900/30">
                {{ $users->links() }}
            </div>
            @endif
        </div>
    </div>
    @endif
    </div>
@endsection
