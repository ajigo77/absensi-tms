<?php

namespace App\Filament\Exports;

use App\Models\Attendance;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Filament\Notifications\Notification;
use Filament\Notifications\NotificationAdminProvider; 
use Illuminate\Support\Str; // Import Str facade for string manipulation
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Notifications\AnonymousNotification;
use Illuminate\Support\Facades\Log;

class AttendanceExporter extends Exporter
{
    protected static ?string $model = Attendance::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')->label('Nama'),
            ExportColumn::make('created_at')->label('Tanggal'),
            ExportColumn::make('shift.name')->label('Shift'),
            ExportColumn::make('status')->label('Status'),
            ExportColumn::make('arrival_time')->label('Waktu Datang'),
            ExportColumn::make('departure_time')->label('Waktu Pulang'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $successfulRows = $export->successful_rows;
        $failedRowsCount = $export->getFailedRowsCount();

        Log::info('Ekspor selesai: ' . $successfulRows . ' baris berhasil, ' . $failedRowsCount . ' baris gagal.');

        $body = 'Your attendance export has completed and ' . number_format($successfulRows) . ' ' . Str::plural('row', $successfulRows) . ' exported.';

        if ($failedRowsCount) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

class YourNotification extends IlluminateNotification
{
    public function via($notifiable)
    {
        return ['database']; // Pastikan ini mencakup 'database'
    }
}
