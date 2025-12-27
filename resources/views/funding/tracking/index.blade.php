@extends('layouts.funding')

@section('title', 'Tracking Berkas - SiFunding')

@section('content')

    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-heading font-bold text-gray-800">Tracking Berkas</h1>
            <p class="text-sm text-gray-500 mt-1">Pantau progres pencetakan dan distribusi buku tabungan.</p>
        </div>
        
        <div class="flex gap-3">
            <button class="inline-flex items-center px-4 py-2 bg-bsi-teal text-white rounded-lg text-sm font-bold shadow-md hover:bg-teal-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Cetak Tanda Terima
            </button>
        </div>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form action="" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal transition" placeholder="Cari Nama Nasabah / NIK...">
            </div>
            <select name="status" class="block w-full md:w-48 pl-3 pr-8 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal bg-white">
                <option value="">Semua Status</option>
                <option value="process">Menunggu Cetak</option>
                <option value="ready">Siap Diserahkan</option>
                <option value="done">Sudah Diserahkan</option>
            </select>
            <button type="submit" class="px-6 py-2 bg-bsi-teal text-white rounded-lg text-sm font-medium hover:bg-teal-700 transition">Filter</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nasabah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Jenis Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Tanggal Masuk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Progres</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Update Terakhir</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Ahmad Fauzi</div>
                            <div class="text-xs text-gray-500">NIK: 1871...0001</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Easy Wadiah</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ date('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap align-middle">
                            <div class="flex items-center space-x-1">
                                <div class="w-8 h-2 rounded-full bg-bsi-teal" title="Input"></div>
                                <div class="w-8 h-2 rounded-full bg-yellow-400" title="Proses Cetak"></div>
                                <div class="w-8 h-2 rounded-full bg-gray-200" title="Siap Serah"></div>
                                <div class="w-8 h-2 rounded-full bg-gray-200" title="Selesai"></div>
                            </div>
                            <span class="text-xs text-yellow-600 font-medium mt-1 block">Menunggu Dicetak</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            2 Jam yang lalu
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 text-xs border border-blue-200 bg-blue-50 px-3 py-1 rounded-full hover:bg-blue-100 transition">Update Status</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                            <div class="text-xs text-gray-500">NIK: 3201...0002</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mudharabah</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">24 Des 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap align-middle">
                            <div class="flex items-center space-x-1">
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                                <div class="w-8 h-2 rounded-full bg-blue-500"></div>
                                <div class="w-8 h-2 rounded-full bg-gray-200"></div>
                            </div>
                            <span class="text-xs text-blue-600 font-medium mt-1 block">Siap Diserahkan</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            Kemarin, 14:00
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <button 
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-handover')"
                                class="text-white hover:bg-teal-700 bg-bsi-teal px-4 py-1.5 rounded-full text-xs font-bold shadow-sm transition ">
                                Serahkan
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Siti Aminah</div>
                            <div class="text-xs text-gray-500">NIK: 1871...0003</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Easy Wadiah</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">20 Des 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap align-middle">
                            <div class="flex items-center space-x-1">
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                                <div class="w-8 h-2 rounded-full bg-bsi-teal"></div>
                            </div>
                            <span class="text-xs text-bsi-teal font-medium mt-1 block">Selesai</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            20 Des, 10:00
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a href="{{ route('tracking.show') }}" class="inline-flex items-center px-3 py-1 bg-white border border-gray-300 rounded-full text-xs font-medium text-gray-700 hover:bg-gray-50 hover:text-bsi-teal transition shadow-sm">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Detail
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="confirm-handover" focusable maxWidth="sm">
    <div class="p-6">
        
        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-bsi-teal rounded-full mb-5 shadow-lg border-4 border-teal-50">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h2 class="text-lg font-bold text-center text-gray-900 mb-2">
            Konfirmasi Serah Terima
        </h2>

        <p class="text-center text-gray-500 text-sm mb-6 leading-relaxed">
            Ubah status menjadi <b>Selesai</b>?<br>Pastikan nasabah sudah menerima buku tabungan.
        </p>

        <form method="get" action="{{ route('tracking.index') }}"> 
            @csrf
            <input type="hidden" name="id" value="1"> 

            <div class="grid grid-cols-2 gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="w-full px-4 py-2.5 bg-white border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">
                    Batal
                </button>

                <button type="submit" class="w-full px-4 py-2.5 bg-bsi-teal text-white font-bold rounded-xl shadow-md hover:bg-teal-700 transition">
                    Ya, Selesai
                </button>
            </div>
        </form>
    </div>
</x-modal>

@endsection