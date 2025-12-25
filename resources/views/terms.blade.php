<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - SiFunding BSI</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bsi: {
                            teal: '#00A39D',    /* Warna Utama BSI */
                            dark: '#008C87',    /* Warna Hover */
                            orange: '#F7941D',  /* Warna Aksen */
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
<body class="bg-gray-50 text-gray-700 antialiased">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="text-center mb-10">
            <img class="h-14 w-auto mx-auto mb-4" src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="Logo BSI">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Syarat dan Ketentuan Penggunaan</h1>
            <p class="mt-2 text-gray-500">Sistem Informasi Monitoring Funding (SiFunding) - KC Diponegoro</p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            
            <div class="bg-bsi-teal h-2 w-full"></div>

            <div class="p-8 sm:p-12 space-y-8">
                
                <div class="text-sm text-gray-500 italic border-b pb-6">
                    Terakhir diperbarui: {{ date('d F Y') }}
                </div>

                <section>
                    <h2 class="text-lg font-bold text-bsi-teal mb-3 flex items-center">
                        <span class="flex items-center justify-center bg-teal-100 text-bsi-teal h-8 w-8 rounded-full mr-3 text-sm font-bold">1</span>
                        Definisi Sistem
                    </h2>
                    <p class="text-sm leading-relaxed text-gray-600 pl-11">
                        <b>SiFunding</b> adalah aplikasi berbasis web yang dikelola oleh Bank Syariah Indonesia KC Diponegoro untuk keperluan monitoring distribusi buku tabungan, pengelolaan berkas nasabah, dan pelaporan kinerja divisi Funding. Aplikasi ini bersifat <b>Internal & Rahasia</b>.
                    </p>
                </section>

                <section>
                    <h2 class="text-lg font-bold text-bsi-teal mb-3 flex items-center">
                        <span class="flex items-center justify-center bg-teal-100 text-bsi-teal h-8 w-8 rounded-full mr-3 text-sm font-bold">2</span>
                        Kerahasiaan Data Nasabah
                    </h2>
                    <div class="ml-11">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-md mb-3">
                            <p class="text-sm text-red-800 font-semibold">
                                PERINGATAN KERAS: Data nasabah adalah aset rahasia bank.
                            </p>
                        </div>
                        <ul class="list-disc list-outside text-sm text-gray-600 space-y-2 pl-4">
                            <li>Pengguna <b>DILARANG</b> menyalin, memotret, mengunduh, atau menyebarkan data pribadi nasabah (Nama, NIK, Alamat, Foto KTP) kepada pihak yang tidak berkepentingan.</li>
                            <li>Data hanya boleh digunakan untuk keperluan operasional pemberkasan dan distribusi buku tabungan.</li>
                            <li>Segala bentuk kebocoran data akibat kelalaian Pengguna akan dikenakan sanksi tegas sesuai peraturan perusahaan dan hukum yang berlaku (UU PDP).</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h2 class="text-lg font-bold text-bsi-teal mb-3 flex items-center">
                        <span class="flex items-center justify-center bg-teal-100 text-bsi-teal h-8 w-8 rounded-full mr-3 text-sm font-bold">3</span>
                        Integritas & Akurasi Data
                    </h2>
                    <div class="ml-11 text-sm text-gray-600 space-y-2">
                        <p>Pengguna wajib memastikan bahwa:</p>
                        <ul class="list-disc list-outside pl-4 space-y-1">
                            <li>Data yang diinput ke dalam sistem sesuai dengan dokumen fisik asli.</li>
                            <li>Status distribusi buku tabungan (<i>Tracking Status</i>) diperbarui secara <i>real-time</i> sesuai kondisi lapangan.</li>
                            <li>Dilarang memalsukan status "Selesai/Distributed" jika buku tabungan belum diterima oleh nasabah.</li>
                        </ul>
                    </div>
                </section>

                <section>
                    <h2 class="text-lg font-bold text-bsi-teal mb-3 flex items-center">
                        <span class="flex items-center justify-center bg-teal-100 text-bsi-teal h-8 w-8 rounded-full mr-3 text-sm font-bold">4</span>
                        Keamanan Akun Pengguna
                    </h2>
                    <p class="text-sm leading-relaxed text-gray-600 pl-11">
                        Akun (Email & Password) bersifat pribadi. Pengguna bertanggung jawab penuh atas segala aktivitas yang terjadi melalui akunnya. Harap lakukan <i>Logout</i> setiap kali meninggalkan perangkat komputer kantor.
                    </p>
                </section>

            </div>

            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between">
                <p class="text-xs text-gray-500 mb-4 sm:mb-0 text-center sm:text-left">
                    Dengan melanjutkan pendaftaran, Anda menyetujui seluruh poin di atas.
                </p>
                
                <button onclick="window.close()" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-bsi-teal hover:bg-bsi-dark transition duration-150 ease-in-out shadow-sm">
                    Tutup & Kembali Mendaftar
                </button>
            </div>

        </div>

        <div class="text-center mt-8">
            <p class="text-xs text-gray-400">
                &copy; 2025 PT Bank Syariah Indonesia Tbk. <br>
                Kantor Cabang Bandar Lampung Diponegoro.
            </p>
        </div>

    </div>

</body>
</html>