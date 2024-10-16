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

class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New attendance'),
            Actions\Action::make('export')
                ->label('Export to Excel')
                ->action(fn () => $this->export()),
            Actions\Action::make('exportPdf')
                ->label('Export to PDF')
                ->action(fn () => $this->exportPdf()),
        ];
    }

    protected function export()
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx'); // Ekspor ke Excel
    }

    protected function exportPdf()
    {
        $attendances = Attendance::with(['user', 'shift'])->get(); // Ambil data attendance

        $pdf = PDF::loadView('filament.attendance.pdf', ['attendances' => $attendances]); // Buat view PDF
        return $pdf->download('attendance.pdf'); // Ekspor ke PDF
    }

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
