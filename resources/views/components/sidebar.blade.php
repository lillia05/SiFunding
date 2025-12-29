<aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col z-10">
    <div class="h-20 flex items-center px-6 border-b border-gray-100">
        <img class="h-10 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo BSI">
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        
        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
        
        {{-- 1. DASHBOARD (Semua User) --}}
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all 
           {{ request()->routeIs('funding.dashboard') || request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal shadow-sm border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        {{-- 2. MANAJEMEN AKUN (Khusus Admin - Di Bawah Dashboard) --}}
        @if(auth()->user()->username === 'admin')
            <a href="{{ route('admin.akun.index') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
               {{ request()->routeIs('admin.akun.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Manajemen Akun
            </a>
        @endif
        
        {{-- 3. DATA NASABAH (Semua User) --}}
        <a href="{{ route('nasabah.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('nasabah.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Data Nasabah
        </a>

        {{-- 4. DISTRIBUSI TABUNGAN (Semua User) --}}
        <a href="{{ route('tracking.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('tracking.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            Distribusi Tabungan
        </a>

        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Pengaturan</p>

        {{-- 5. PROFIL SAYA (Semua User termasuk Admin) --}}
        <a href="{{ route('profile.edit') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            Profil Saya
        </a>

    </nav>

    <div class="border-t border-gray-100 p-4 bg-gray-50">
        <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-bsi-teal flex items-center justify-center text-white font-bold shadow-md uppercase">
                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
            </div>
            
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-semibold text-gray-800 truncate w-32">
                    {{ auth()->user()->name ?? auth()->user()->username }}
                </p>
                <p class="text-xs text-gray-500 truncate">
                    {{ auth()->user()->username === 'admin' ? 'Administrator' : 'Funding Officer' }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Keluar">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </div>
</aside>