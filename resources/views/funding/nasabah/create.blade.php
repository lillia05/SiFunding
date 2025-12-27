@extends('layouts.funding')

@section('title', 'Input Nasabah Baru - SiFunding')

@section('content')

    <div class="flex items-center justify-between mb-8">
        
        <div class="flex-1">
            <a href="{{ route('nasabah.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-bsi-teal transition shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="flex-1 text-center">
            <h1 class="text-2xl font-heading font-bold text-gray-800">Input Data Nasabah</h1>
            <p class="text-sm text-gray-500 mt-1 whitespace-nowrap">Isi formulir lengkap sesuai identitas nasabah.</p>
        </div>

        <div class="flex-1"></div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl shadow-sm flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('nasabah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            
            <div class="xl:col-span-2 space-y-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-bsi-teal/10 rounded-bl-full"></div>
                    
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-teal-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        Informasi Akun & Produk
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap (Sesuai KTP)</label>
                            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-gray-50 focus:bg-white" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-gray-50 focus:bg-white" placeholder="email@contoh.com" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Rekening BSI Lama <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <input type="number" name="rek_bsi_lama" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-gray-50 focus:bg-white" placeholder="Nomor rekening jika ada">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Tabungan</label>
                            <div class="relative">
                                <select name="jenis_produk" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-gray-50 focus:bg-white appearance-none cursor-pointer" required>
                                    <option value="">Pilih Produk Pembukaan Rekening</option>
                                    <option value="Easy Wadiah">Easy Wadiah</option>
                                    <option value="Easy Mudharabah">Easy Mudharabah</option>
                                    <option value="Tabungan Haji">Tabungan Haji</option>
                                    <option value="Tabungan Bisnis">Tapenas</option>
                                    <option value="Tabungan Payroll">Payroll Wadiah</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-orange-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </span>
                        Biodata Diri
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">NIK KTP</label>
                            <input type="number" name="nik_ktp" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="16 digit angka" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nomor NPWP</label>
                            <input type="text" name="npwp" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Nomor NPWP">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ibu Kandung</label>
                            <input type="text" name="nama_ibu" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition text-gray-600" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Handphone (WA)</label>
                            <input type="number" name="no_hp" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Status Pernikahan</label>
                            <div class="relative">
                                <select name="status_pernikahan" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-white cursor-pointer appearance-none">
                                    <option value="Lajang">Lajang</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Janda/Duda">Janda / Duda</option>
                                </select>
                                
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kode Pos</label>
                            <input type="number" name="kode_pos" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Contoh: 35141">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Domisili</label>
                            <textarea name="alamat" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-indigo-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        Informasi Pekerjaan
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Area Kerja</label>
                            <input type="text" name="nama_instansi" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition placeholder-gray-400" placeholder="Contoh: PLN UPT Bengkulu, GI Lahat, dll" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan</label>
                            <input type="text" name="pekerjaan" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition placeholder-gray-400" placeholder="Contoh: Satpam, Cleaning Service, Teknisi" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </span>
                        Kontak Darurat
                    </h2>
                    <p class="text-xs text-gray-400 mb-4 -mt-4 ml-14">Keluarga tidak serumah</p>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Kerabat</label>
                            <input type="text" name="nama_keluarga" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">No. HP Kerabat</label>
                            <input type="number" name="hp_keluarga" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Kerabat</label>
                            <textarea name="alamat_keluarga" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </span>
                        Upload Dokumen
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Foto KTP</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition hover:border-bsi-teal group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-bsi-teal transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="text-xs text-gray-500">Upload JPG/PNG</p>
                                    </div>
                                    <input type="file" name="foto_ktp" class="hidden" accept="image/*" />
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Foto NPWP</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition hover:border-bsi-teal group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-bsi-teal transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="text-xs text-gray-500">Upload JPG/PNG</p>
                                    </div>
                                    <input type="file" name="foto_npwp" class="hidden" accept="image/*" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sticky top-8">
                    <button type="submit" class="w-full bg-bsi-teal text-white font-bold py-4 rounded-xl shadow-lg hover:bg-teal-700 transition transform hover:-translate-y-1 flex justify-center items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Data Nasabah
                    </button>
                </div>

            </div>
        </div>
    </form>

@endsection