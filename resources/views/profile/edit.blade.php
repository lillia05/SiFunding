@extends('layouts.funding')

@section('title', 'Profil Saya - SiFunding')

@section('content')

    <div class="max-w-6xl mx-auto pb-12">
        
        <div class="mb-8">
            <h1 class="text-3xl font-heading font-bold text-gray-800">Profil Saya</h1>
            <p class="text-gray-500 mt-1">Kelola data diri, foto profil, dan preferensi keamanan akun Anda.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="lg:w-1/3">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-8">
                    
                    <div class="h-32 bg-gradient-to-r from-bsi-teal to-teal-700 relative">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-10 -mt-10"></div>
                        <div class="absolute bottom-0 left-0 w-16 h-16 bg-bsi-orange/20 rounded-full -ml-8 -mb-8"></div>
                    </div>
                    
                    <div class="px-6 pb-8 relative text-center">
                        <div class="relative -mt-16 mb-4 inline-block group">
                            <div class="h-32 w-32 rounded-full border-4 border-white bg-white shadow-md flex items-center justify-center overflow-hidden relative">
                                <span class="text-4xl font-bold text-bsi-teal select-none">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                                
                                <label for="photo_input" class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </label>
                            </div>

                            <label for="photo_input" class="absolute bottom-1 right-1 bg-bsi-orange text-white p-2.5 rounded-full shadow-lg cursor-pointer hover:bg-orange-600 transition transform hover:scale-110 border-2 border-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </label>
                            
                            <input type="file" id="photo_input" class="hidden" accept="image/*">
                        </div>

                        <h2 class="text-xl font-heading font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                        <p class="text-sm text-gray-500 font-medium">{{ '@' . (Auth::user()->username ?? strtolower(str_replace(' ', '', Auth::user()->name))) }}</p>
                        
                        <div class="mt-6 border-t border-gray-100 pt-4 text-left space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Jabatan</span>
                                <span class="px-3 py-1 rounded-full bg-teal-50 text-bsi-teal font-bold text-xs border border-teal-100">Funding Officer</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Bergabung Sejak</span>
                                <span class="font-medium text-gray-700">{{ Auth::user()->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 space-y-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 relative">
                    <div class="flex items-center mb-8 pb-4 border-b border-gray-100">
                        <div class="p-3 bg-teal-50 rounded-xl text-bsi-teal mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Detail Akun</h3>
                            <p class="text-sm text-gray-500">Perbarui username dan informasi kontak Anda.</p>
                        </div>
                    </div>

                    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="username" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                            <input type="text" id="username" name="username" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal transition-all duration-200 outline-none placeholder-gray-400"
                                value="{{ old('username', Auth::user()->username) }}" 
                                required autocomplete="username" 
                                placeholder="Masukkan username">
                            @error('username') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                            <input type="email" id="email" name="email" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-1 focus:ring-bsi-teal focus:border-bsi-teal transition-all duration-200 outline-none placeholder-gray-400"
                                value="{{ old('email', Auth::user()->email) }}" 
                                required autocomplete="email" 
                                placeholder="contoh@bsi.co.id">
                            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="px-6 py-3 bg-bsi-teal text-white font-bold rounded-xl shadow-md hover:bg-teal-700 hover:shadow-lg focus:ring-4 focus:ring-teal-200 transition-all transform hover:-translate-y-0.5">
                                Simpan Perubahan
                            </button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Berhasil disimpan.
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-8 pb-4 border-b border-gray-100">
                        <div class="p-3 bg-orange-50 rounded-xl text-bsi-orange mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Keamanan</h3>
                            <p class="text-sm text-gray-500">Update password secara berkala untuk keamanan akun.</p>
                        </div>
                    </div>

                    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi Saat Ini</label>
                            <input type="password" id="current_password" name="current_password" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-bsi-orange focus:border-bsi-orange transition-all duration-200 outline-none placeholder-gray-400"
                                autocomplete="current-password" 
                                placeholder="Masukkan kata sandi lama">
                            @error('current_password', 'updatePassword') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi Baru</label>
                                <input type="password" id="password" name="password" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-bsi-orange focus:border-bsi-orange transition-all duration-200 outline-none placeholder-gray-400"
                                    autocomplete="new-password" 
                                    placeholder="Minimal 8 karakter">
                                @error('password', 'updatePassword') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-bsi-orange focus:border-bsi-orange transition-all duration-200 outline-none placeholder-gray-400"
                                    autocomplete="new-password" 
                                    placeholder="Ulangi kata sandi baru">
                                @error('password_confirmation', 'updatePassword') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="px-6 py-3 bg-bsi-orange text-white font-bold rounded-xl shadow-md hover:bg-orange-500 hover:shadow-lg focus:ring-4 focus:ring-orange-200 transition-all transform hover:-translate-y-0.5">
                                Update Kata Sandi
                            </button>

                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Password berhasil diubah.
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="bg-red-50/50 p-8 rounded-2xl shadow-sm border border-red-100">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-red-700 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Hapus Akun
                            </h3>
                            <p class="text-sm text-gray-600 mt-2 max-w-xl leading-relaxed">
                                Menghapus akun bersifat permanen. Semua data nasabah yang terkait dengan akun ini akan diarsipkan atau dihapus sesuai kebijakan sistem. Harap unduh data penting sebelum melanjutkan.
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" 
                            class="px-5 py-2.5 bg-red-600 text-white font-bold rounded-xl shadow hover:bg-red-700 transition focus:outline-none focus:ring-4 focus:ring-red-200">
                            Hapus Akun Saya
                        </button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-bold text-gray-900">
                                    Apakah Anda yakin ingin menghapus akun?
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    Setelah akun dihapus, semua data akan hilang permanen. Silakan masukkan kata sandi Anda untuk konfirmasi penghapusan.
                                </p>

                                <div class="mt-6">
                                    <label for="password" class="sr-only">Kata Sandi</label>

                                    <input id="password" name="password" type="password" 
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 outline-none"
                                        placeholder="Masukkan Kata Sandi Anda" />

                                    @error('password', 'userDeletion') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-6 flex justify-end gap-3">
                                    <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition">
                                        Batal
                                    </button>

                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition shadow-md">
                                        Ya, Hapus Akun
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection