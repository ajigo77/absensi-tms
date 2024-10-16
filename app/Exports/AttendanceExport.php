<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::with(['user', 'shift'])->get(); // Ambil data attendance dengan relasi
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tipe Absensi',
            'Shift',
            'Status',
            'Waktu Pulang',
            'Waktu Datang',
        ];
    }
}
