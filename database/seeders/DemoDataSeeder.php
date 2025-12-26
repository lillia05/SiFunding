<?php

namespace Database\Seeders;

use App\Models\Nasabah;
use App\Models\PengajuanRek;
use App\Models\StatusLog;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $funding = User::create([
            'username' => 'funding',
            'email' => 'funding@bsi.com',
            'password' => Hash::make('12345678'),
            'role' => 'Funding',
            'email_verified_at' => now(), 
        ]);

        $dataPendaftar = [
            [
                'username' => 'fauzi99',
                'email' => 'fauzi@example.com',
                'nik' => '3201010101010001',
                'status' => 'draft', 
                'produk' => 'Payroll Wadiah'
            ],
            [
                'username' => 'sitiaminah',
                'email' => 'siti@example.com',
                'nik' => '3201010101010002',
                'status' => 'process', 
                'produk' => 'Easy Mudharabah'
            ],
            [
                'username' => 'budi_s',
                'email' => 'budi@example.com',
                'nik' => '3201010101010003',
                'status' => 'ready', 
                'produk' => 'Haji'
            ],
            [
                'username' => 'rina wijaya',
                'email' => 'rina@example.com',
                'nik' => '3201010101010004',
                'status' => 'done', 
                'produk' => 'Tapenas'
            ],
            [
                'username' => 'andi pratama',
                'email' => 'andi@example.com',
                'nik' => '3201010101010005',
                'status' => 'draft', 
                'produk' => 'Easy Wadiah'
            ],
        ];

        foreach ($dataPendaftar as $data) {
            $userNasabah = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make('12345678'),
                'role' => 'Nasabah',
                'email_verified_at' => now(), 
            ]);

            $nasabah = Nasabah::create([
                'user_id' => $userNasabah->id,
                'nik_ktp' => $data['nik'],
                'tempat_lahir' => 'Bandar Lampung',
                'tanggal_lahir' => '1995-05-10',
                'alamat' => 'Jl. Diponegoro No. ' . rand(1, 50),
                'kode_pos' => '35111',
                'status_pernikahan' => 'Lajang',
                'no_hp' => '0812' . rand(11111111, 99999999),
                'nama_ibu' => 'Ibu Kandung ' . $data['username'],
                'nama_keluarga_tidak_serumah' => 'Keluarga ' . $data['username'],
                'alamat_keluarga_tidak_serumah' => 'Alamat Keluarga...',
                'no_hp_keluarga_tidak_serumah' => '0899' . rand(11111111, 99999999),
            ]);

            $pengajuan = PengajuanRek::create([
                'nasabah_id' => $nasabah->id,
                'jenis_produk' => $data['produk'],
                'no_rek' => in_array($data['status'], ['ready', 'done']) ? '7' . rand(100000000, 999999999) : null,
                'status' => $data['status'],
                'tanggal_input' => Carbon::now()->subDays(rand(1, 5)),
            ]);

            StatusLog::create([
                'pengajuan_id' => $pengajuan->id,
                'user_id' => $userNasabah->id, 
                'status_lama' => '-',
                'status_baru' => 'draft',
                'catatan' => 'Nasabah melakukan pendaftaran mandiri melalui sistem SiFunding.',
                'created_at' => $pengajuan->tanggal_input,
            ]);

            if ($data['status'] !== 'draft') {
                StatusLog::create([
                    'pengajuan_id' => $pengajuan->id,
                    'user_id' => $funding->id,
                    'status_lama' => 'draft',
                    'status_baru' => $data['status'],
                    'catatan' => 'Status berkas diperbarui oleh petugas funding untuk proses selanjutnya.',
                    'created_at' => Carbon::now(),
                ]);
            }
        }
    }
}