<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Exports\AttendanceExport;
use App\Models\Attendance; // Pastikan Attendance diimpor
use App\Filament\Resources\AttendanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF; // Import PDF
use Filament\Tables\Filters\Filter; // Import Filter
use Filament\Forms\Components\DatePicker; // Import DatePicker
use App\Models\Member;
use App\Models\User;


class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('kehadiran Terbaru'),
            Actions\Action::make('export')
                ->label('Export ke Exel')
                ->action(fn () => $this->export()),
            // Actions\Action::make('exportPdf')
            //     ->label('Export to PDF')
            //     ->action(fn () => $this->exportPdf()),
        ];
    }

    protected function export()
    {
        // Ambil semua data attendance dengan nama user dan shift
        $attendances = Attendance::with(['member', 'shift']) // Ambil nama user dan shift
            ->get() // Get all records
            ->map(function ($attendance) {
                return [
                    'Nama' => $attendance->member->nama ?? 'Unknown', // Ganti ID dengan nama member atau ID jika tidak ada
                    'Tipe Absen' => $attendance->type, // Pastikan ini sesuai dengan kolom yang ada
                    'Shift' => $attendance->shift->name ?? 'Unknown', // Ganti ID dengan nama shift atau ID jika tidak ada
                    'Status' => $attendance->status,
                    'Waktu Datang' => $attendance->type === 'masuk kerja' ? $attendance->created_at->format('H:i:s') : 'N/A', // Set Waktu Datang
                    'Waktu Pulang' => $attendance->type === 'pulang' ? $attendance->created_at->format('H:i:s') : 'N/A', // Set Waktu Pulang
                    'Foto' => $attendance->foto ?? 'No Photo',
                    'Latitude' => $attendance->lattitude ?? 'Unknown',
                    'Longitude' => $attendance->longtitude ?? 'Unknown',
                ];
            });

        // Ekspor ke Excel
        return Excel::download(new AttendanceExport($attendances), 'attendance.xlsx'); // Pastikan AttendanceExport menerima data
    }

    // protected function exportPdf()
    // {
    //     $attendances = Attendance::with(['user', 'shift'])->get(); // Ambil data attendance

    //     $pdf = PDF::loadView('filament.attendance.pdf', ['attendances' => $attendances]); // Buat view PDF
    //     return $pdf->download('attendance.pdf'); // Ekspor ke PDF
    // }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')
                        ->label('Dari Tanggal')
                        ->placeholder('dd/mm/yyyy'),
                    DatePicker::make('created_until')
                        ->label('Sampai Tanggal')
                        ->default(now()),
                ])
                ->query(function ($query, $data) {
                    return $query
                        ->when($data['created_from'], fn ($query, $date) => $query->whereDate('created_at', '>=', $date))
                        ->when($data['created_until'], fn ($query, $date) => $query->whereDate('created_at', '<=', $date));
                }),
            Filter::make('status')
                ->select([
                    'on time' => 'Tepat Waktu',
                    'terlambat' => 'Terlambat',
                    'Izin' => 'Izin',
                    'Sakit' => 'Sakit',
                    'Cuti' => 'Cuti',
                ])
                ->query(fn ($query, $value) => $query->where('status', $value)),
        ];
    }
}
