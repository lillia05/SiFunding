<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulir Pengajuan Nasabah - SiFunding</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bsi: { 
                            teal: '#00A39D', 
                            dark: '#008C87', 
                            orange: '#F7941D', 
                            gold: '#C4A006' 
                        }
                    },
                    fontFamily: { 
                        sans: ['Inter', 'sans-serif'], 
                        heading: ['Poppins', 'sans-serif'] 
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-800 min-h-screen flex flex-col">

    {{-- NAVBAR SEDERHANA --}}
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <img class="h-10 w-auto mr-3" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo BSI">
                    <div class="hidden md:block border-l-2 border-gray-200 pl-4 ml-4">
                        <h1 class="text-lg font-heading font-bold text-bsi-teal leading-none">SiFunding</h1>
                        <p class="text-xs text-gray-400 mt-1 tracking-wide">System Monitoring Distribusi Tabungan</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- KONTEN UTAMA --}}
    <main class="flex-grow py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            {{-- HEADER HALAMAN --}}
            <div class="flex justify-center items-center mb-8">
                <div class="text-center">
                    <h1 class="text-2xl font-heading font-bold text-gray-800">Formulir Pembukaan Rekening</h1>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi data di bawah ini. Akun akan dibuat otomatis.</p>
                </div>
            </div>

            {{-- ALERT ERROR --}}
            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm">
                <h3 class="font-bold mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Mohon perbaiki kesalahan berikut:
                </h3>
                <ul class="list-disc list-inside text-sm ml-7">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- FORM INPUT --}}
            <form action="{{ route('nasabah.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    
                    {{-- KOLOM KIRI --}}
                    <div class="xl:col-span-2 space-y-8">
                        
                        {{-- CARD 1: INFORMASI AKUN & PRODUK --}}
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-bsi-teal/10 rounded-bl-full"></div>
                            
                            <h2 class="text-lg font-heading font-bold text-gray-800 mb-6 flex items-center relative z-10">
                                <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-teal-100">1</span>
                                Informasi Produk & Akun
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Nama Lengkap (Jadi Username) --}}
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap (Sesuai KTP) <span class="text-red-500">*</span></label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Masukkan nama lengkap Anda" required>
                                    <p class="text-xs text-gray-400 mt-1">Nama ini akan digunakan sebagai Username login Anda.</p>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email Aktif <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Contoh: nasabah@gmail.com" required>
                                    <p class="text-xs text-gray-400 mt-1">Link verifikasi akan dikirim ke email ini.</p>
                                </div>

                                {{-- Rekening Lama --}}
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Rekening BSI Lama <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                    <input type="number" name="rek_bsi_lama" value="{{ old('rek_bsi_lama') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Nomor rekening lama jika ada">
                                </div>

                                {{-- Produk --}}
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Tabungan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="jenis_produk" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-white appearance-none cursor-pointer" required>
                                            <option value="">-- Pilih Produk Pembukaan Rekening --</option>
                                            <option value="Easy Wadiah" {{ old('jenis_produk') == 'Easy Wadiah' ? 'selected' : '' }}>Easy Wadiah</option>
                                            <option value="Easy Mudharabah" {{ old('jenis_produk') == 'Easy Mudharabah' ? 'selected' : '' }}>Easy Mudharabah</option>
                                            <option value="Haji" {{ old('jenis_produk') == 'Haji' ? 'selected' : '' }}>Tabungan Haji</option>
                                            <option value="Tapenas" {{ old('jenis_produk') == 'Tapenas' ? 'selected' : '' }}>Tapenas</option>
                                            <option value="Payroll Wadiah" {{ old('jenis_produk') == 'Payroll Wadiah' ? 'selected' : '' }}>Payroll Wadiah</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 2: BIODATA DIRI --}}
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-heading font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-orange-100">2</span>
                                Biodata Diri
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">NIK KTP <span class="text-red-500">*</span></label>
                                    <input type="number" name="nik_ktp" value="{{ old('nik_ktp') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="16 digit angka" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nomor NPWP</label>
                                    <input type="text" name="npwp" value="{{ old('npwp') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Nomor NPWP">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ibu Kandung <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition text-gray-600" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Handphone (WA) <span class="text-red-500">*</span></label>
                                    <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="08xxxxxxxxxx" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Status Pernikahan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="status_pernikahan" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition bg-white cursor-pointer appearance-none">
                                            <option value="Lajang">Lajang</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Janda/Duda">Janda / Duda</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Kode Pos</label>
                                    <input type="number" name="kode_pos" value="{{ old('kode_pos') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Contoh: 35141">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Domisili <span class="text-red-500">*</span></label>
                                    <textarea name="alamat" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan" required>{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 3: INFORMASI PEKERJAAN --}}
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-heading font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-indigo-100">3</span>
                                Informasi Pekerjaan
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Area Kerja <span class="text-red-500">*</span></label>
                                    <input type="text" name="area_kerja" value="{{ old('area_kerja') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition placeholder-gray-400" placeholder="Contoh: PLN UPT Bengkulu, GI Lahat, dll" required>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition placeholder-gray-400" placeholder="Contoh: Satpam, Cleaning Service, Teknisi" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- KOLOM KANAN --}}
                    <div class="space-y-8">
                        
                        {{-- CARD 4: KONTAK DARURAT --}}
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-heading font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3 border border-blue-100">4</span>
                                Kontak Darurat
                            </h2>
                            <p class="text-xs text-gray-400 mb-4 -mt-4 ml-14">Keluarga tidak serumah</p>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Kerabat <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama_keluarga" value="{{ old('nama_keluarga') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">No. HP Kerabat <span class="text-red-500">*</span></label>
                                    <input type="number" name="hp_keluarga" value="{{ old('hp_keluarga') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal outline-none transition" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Kerabat <span class="text-red-500">*</span></label>
                                    <textarea name="alamat_keluarga" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>{{ old('alamat_keluarga') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 5: UPLOAD DOKUMEN --}}
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                            <h2 class="text-lg font-heading font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-full bg-teal-50 text-bsi-teal flex items-center justify-center mr-3">5</span>
                                Upload Dokumen
                            </h2>

                            <div class="space-y-4">
                                {{-- KTP --}}
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto KTP <span class="text-red-500">*</span></label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="foto_ktp" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition hover:border-bsi-teal group overflow-hidden relative">
                                            
                                            <div id="placeholder_ktp" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-bsi-teal transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="text-xs text-gray-500">Klik untuk upload KTP</p>
                                            </div>
                                            
                                            <img id="preview_ktp" class="hidden w-full h-full object-cover rounded-xl absolute inset-0" />
                                            
                                            <input type="file" id="foto_ktp" name="foto_ktp" class="hidden" accept="image/*" onchange="previewImage(this, 'preview_ktp', 'placeholder_ktp')" required />
                                        </label>
                                    </div>
                                </div>
                                
                                {{-- NPWP --}}
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto NPWP (Opsional)</label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="foto_npwp" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition hover:border-bsi-teal group overflow-hidden relative">
                                            
                                            <div id="placeholder_npwp" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-bsi-teal transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <p class="text-xs text-gray-500">Klik untuk upload NPWP</p>
                                            </div>

                                            <img id="preview_npwp" class="hidden w-full h-full object-cover rounded-xl absolute inset-0" />

                                            <input type="file" id="foto_npwp" name="foto_npwp" class="hidden" accept="image/*" onchange="previewImage(this, 'preview_npwp', 'placeholder_npwp')" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TOMBOL SUBMIT STICKY --}}
                        <div class="sticky top-24">
                            <button type="submit" class="w-full bg-bsi-teal text-white font-bold py-4 rounded-xl shadow-lg hover:bg-teal-700 transition transform flex justify-center items-center group">
                                <svg class="w-5 h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Data
                            </button>
                            <p class="text-xs text-center text-gray-400 mt-2">Password akun akan otomatis diset: 12345678</p>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-gray-100 py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} PT Bank Syariah Indonesia Tbk. All rights reserved.
        </div>
    </footer>

    {{-- Script Preview Gambar --}}
    <script>
        function previewImage(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>