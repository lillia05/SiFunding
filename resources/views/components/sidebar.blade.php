<aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col z-10">
    <div class="h-20 flex items-center px-6 border-b border-gray-100">
        <img class="h-10 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo BSI">
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
        
        <a href="{{ route('funding.dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all 
           {{ request()->routeIs('funding.dashboard') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal shadow-sm border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        <a href="{{ route('nasabah.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('nasabah.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Data Nasabah
        </a>

        <a href="{{ route('tracking.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('tracking.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            Distribusi Tabungan
        </a>

        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Pengaturan</p>

        <a href="{{ route('profile.edit') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-colors
           {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-teal-50 to-white text-bsi-teal border-l-4 border-bsi-teal' : 'text-gray-600 hover:bg-gray-50 hover:text-bsi-teal' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            Profil Saya
        </a>
    </nav>

    <div class="border-t border-gray-100 p-4 bg-gray-50">
        <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-bsi-teal flex items-center justify-center text-white font-bold shadow-md">
                F
            </div>
            <div class="ml-3">
                <p class="text-sm font-semibold text-gray-800">Staff Funding</p>
                <p class="text-xs text-gray-500">Log out</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </form>
        </div>
    </div>
</aside>