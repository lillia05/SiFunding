<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} - {{ auth()->user()->role }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    Selamat Datang, <strong>{{ auth()->user()->name }}</strong>! 
                    Anda login sebagai <span class="text-teal-600 font-bold">{{ auth()->user()->role }}</span>.
                </div>
            </div>

            @if(auth()->user()->role === 'Nasabah')
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-orange-500">
                    <h3 class="text-lg font-bold mb-2">Halo Nasabah BSI</h3>
                    <p class="text-gray-600 mb-4">Silakan lengkapi formulir pendaftaran untuk pembukaan rekening baru.</p>
                    <a href="{{ route('nasabah.daftar') }}" class="inline-block px-6 py-2 bg-orange-500 text-white font-bold rounded hover:bg-orange-600 transition">
                        Isi Form Pendaftaran
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>