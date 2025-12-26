<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Funding - SiFunding BSI</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
                            gold: '#C4A006',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
            <div class="h-16 flex items-center px-6 border-b border-gray-200">
                <img class="h-8 w-auto mr-3" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo BSI">
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                
                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium bg-teal-50 text-bsi-teal rounded-lg group">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-bsi-teal group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-bsi-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Input Data Nasabah
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-bsi-teal group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-bsi-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    Tracking Berkas
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-bsi-teal group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-bsi-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Laporan Bulanan
                </a>
            </nav>

            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center">
                    <div class="h-9 w-9 rounded-full bg-bsi-teal flex items-center justify-center text-white font-bold">
                        F
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Funding Staff</p>
                        <p class="text-xs text-gray-500">funding@bsi.co.id</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100">
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="md:hidden h-16 bg-white border-b flex items-center px-4 justify-between">
                <img class="h-6" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo">
                <button class="text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-8">
                
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Beranda Funding</h1>
                        <p class="text-gray-600 mt-1">Monitoring perkembangan distribusi buku tabungan hari ini.</p>
                    </div>
                    <a href="#" class="hidden sm:inline-flex items-center px-4 py-2 bg-bsi-orange border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 transition">
                        + Input Nasabah Baru
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Nasabah (Bulan Ini)</p>
                                    <p class="text-2xl font-bold text-gray-900">124</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-2">
                            <a href="#" class="text-xs font-medium text-blue-600 hover:text-blue-500">Lihat semua data &rarr;</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-yellow-400">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-50 text-yellow-500">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Status Pending</p>
                                    <p class="text-2xl font-bold text-gray-900">18</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-2 flex justify-between items-center">
                            <span class="text-xs text-gray-500">Perlu tindak lanjut</span>
                            <a href="#" class="text-xs font-medium text-yellow-600 hover:text-yellow-500">Proses &rarr;</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-bsi-teal">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-teal-50 text-bsi-teal">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Status Completed</p>
                                    <p class="text-2xl font-bold text-gray-900">86</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-2">
                            <span class="text-xs text-gray-500">Buku tabungan diterima nasabah</span>
                        </div>
                    </div>

                </div>

                <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Antrean Input Terbaru</h3>
                        <a href="#" class="text-sm text-bsi-teal hover:underline">Lihat Selengkapnya</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Nasabah</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tabungan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Input</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">Ahmad Fauzi</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Easy Wadiah</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">26 Des 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-bsi-teal hover:text-teal-900">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">Siti Aminah</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mudharabah</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25 Des 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Printed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-bsi-teal hover:text-teal-900">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>

    </div>

</body>
</html>