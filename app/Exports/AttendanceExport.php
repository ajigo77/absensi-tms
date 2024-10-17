<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    protected $attendances;

    public function __construct($attendances)
    {
        $this->attendances = $attendances;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->attendances);
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
