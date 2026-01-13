<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Nasabah;
use App\Models\PekerjaanNasabah;
use App\Models\PengajuanRek;
use App\Models\StatusLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class NasabahImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        if (!isset($row['email']) || !isset($row['nik'])) {
            return null;
        }

        return DB::transaction(function() use ($row) {
            
            $user = User::firstOrCreate(
                ['email' => $row['email']], 
                [
                    'username'          => $row['nama_nasabah'], 
                    'password'          => Hash::make('12345678'), 
                    'role'              => 'Nasabah',
                    'email_verified_at' => now(),
                ]
            );

            if (!$user->wasRecentlyCreated) {
                $user->update(['username' => $row['nama_nasabah']]);
            }

            $tanggalLahir = $row['tanggal_lahir'];
            
            if (is_numeric($tanggalLahir)) {
                $tanggalLahir = Date::excelToDateTimeObject($tanggalLahir);
            }
            $nasabah = Nasabah::updateOrCreate(
                ['nik_ktp' => $row['nik']], 
                [
                    'user_id'                       => $user->id,
                    'npwp'                          => $row['npwp'] ?? null,
                    'tempat_lahir'                  => $row['tempat_lahir'],
                    'tanggal_lahir'                 => $tanggalLahir, 
                    'no_hp'                         => $row['no_hp'],
                    'alamat'                        => $row['alamat_domisili'],
                    'kode_pos'                      => $row['kode_pos'],
                    'status_pernikahan'             => $row['status_pernikahan'],
                    'nama_ibu'                      => $row['nama_ibu_kandung'],
                    'rek_bsi_lama'                  => $row['rekening_bsi_lama'] ?? null,
                    'nama_keluarga_tidak_serumah'   => $row['nama_keluarga_darurat'],
                    'no_hp_keluarga_tidak_serumah'  => $row['no_hp_keluarga_darurat'],
                    'alamat_keluarga_tidak_serumah' => $row['alamat_keluarga_darurat'],
                ]
            );

            PekerjaanNasabah::updateOrCreate(
                ['nasabah_id' => $nasabah->id],
                [
                    'area_kerja' => $row['area_kerja'],
                    'jabatan'    => $row['jabatan'],
                ]
            );

            $pengajuan = PengajuanRek::firstOrCreate(
                [
                    'nasabah_id'    => $nasabah->id,
                    'jenis_produk'  => $row['jenis_tabungan'],
                    'status'        => 'draft',
                ],
                [
                    'tanggal_input' => now(),
                ]
            );

            if ($pengajuan->wasRecentlyCreated) {
                StatusLog::create([
                    'pengajuan_id' => $pengajuan->id,
                    'user_id'      => auth()->id() ?? 1, 
                    'status_baru'  => 'draft',
                    'catatan'      => 'Import data via Excel',
                ]);
            }

            return $nasabah;
        });
    }

    public function rules(): array
    {
        return [
            'nama_nasabah' => 'required|string',
            'email' => 'required|email', 
            'nik' => 'required|numeric', 
            'npwp' => 'nullable',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'alamat_domisili' => 'required',
            'kode_pos' => 'required',
            'status_pernikahan' => 'required',
            'nama_ibu_kandung' => 'required',
            'nama_keluarga_darurat' => 'required',
            'no_hp_keluarga_darurat' => 'required',
            'alamat_keluarga_darurat' => 'required',
            'area_kerja' => 'required',
            'jabatan' => 'required',
            'jenis_tabungan' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'email.required' => 'Kolom Email wajib diisi.',
            'nik.required' => 'Kolom NIK wajib diisi.',
        ];
    }
}