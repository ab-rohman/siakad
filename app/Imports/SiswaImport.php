<?php

namespace App\Imports;

use App\Siswa;
use App\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[3] != 'KELAS1') {
            $row[3] = 'KELAS1';
        }
        if ($row[2] == 'Laki-laki') {
            $row[2] = 'L';
        }else{
            $row[2] = 'P';
        }
        $kelas = Kelas::where('nama_kelas', $row[3])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/siswa/fotocwok.jpg';
        } else {
            $foto = 'uploads/siswa/fotocwek.png';
        }

        return new Siswa([
            'nama_siswa' => $row[0],
            'no_induk' => $row[1],
            'jk' => $row[2],
            'foto' => $foto,
            'kelas_id' => $kelas->id,
        ]);
    }
}
