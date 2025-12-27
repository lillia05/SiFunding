@extends('layouts.funding')

@section('title', 'Detail Tracking - SiFunding')

@section('content')

    <div class="max-w-6xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ route('tracking.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:text-bsi-teal hover:border-bsi-teal hover:bg-teal-50 transition shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden relative">
            
            <div class="bg-teal-50 border-b border-teal-100 px-6 py-5 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="h-12 w-12 bg-bsi-teal text-white rounded-full flex items-center justify-center shadow-md mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Buku Tabungan Diserahkan</h2>
                        <p class="text-sm text-teal-600 font-medium">Proses tracking telah selesai sepenuhnya.</p>
                    </div>
                </div>
                
                <div class="text-right">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Waktu Penyerahan</p>
                    <p class="text-lg font-bold text-gray-800">20 Des 2025, 10:00 WIB</p>
                </div>
            </div>

            <div class="p-6 md:p-8">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-bsi-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Informasi Rekening Nasabah
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                    
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs text-gray-400 uppercase font-medium">Nama Nasabah</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">Siti Aminah</p>
                    </div>

                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs text-gray-400 uppercase font-medium">NIK (Nomor Induk Kependudukan)</p>
                        <p class="text-lg font-mono text-gray-800 mt-1 bg-gray-50 inline-block px-2 rounded">1871056501900003</p>
                    </div>

                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs text-gray-400 uppercase font-medium">Nomor Rekening</p>
                        <div class="flex items-center mt-1">
                            <p class="text-xl font-bold text-bsi-teal font-mono">700-555-4443</p>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs text-gray-400 uppercase font-medium">Jenis Produk</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-50 text-bsi-teal mt-1">
                            Easy Wadiah
                        </span>
                    </div>

                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs text-gray-400 uppercase font-medium">Nomor Telepon</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">0857-1234-5678</p>
                    </div>

                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                    <button onclick="window.print()" class="inline-flex items-center px-6 py-3 bg-bsi-teal text-white rounded-xl text-sm font-bold shadow-md hover:bg-teal-700 transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Cetak Tanda Terima
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection