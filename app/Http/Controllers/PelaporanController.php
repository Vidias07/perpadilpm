<?php

// app/Http/Controllers/PelaporanController.php

namespace App\Http\Controllers;

use App\Models\Perpadi;
use App\Models\LPM;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\DataPenggilingan;
use App\Models\DataLumbung;

use PDF;
use Storage;
use Str;

class PelaporanController extends Controller
{
    public function generateReport(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $dataPenggilingan = DataPenggilingan::with('perpadi')
            ->whereHas('perpadi', function($query) use ($start_date, $end_date) {
                $query->whereBetween('created_at', [$start_date, $end_date]);
            })
            ->get();

        $dataLumbung = DataLumbung::with('lpm')
            ->whereHas('lpm', function($query) use ($start_date, $end_date) {
                $query->whereBetween('created_at', [$start_date, $end_date]);
            })
            ->get();

        // Generate laporan (misalnya PDF)
        $pdf = PDF::loadView('report_template', [
            'dataPenggilingan' => $dataPenggilingan,
            'dataLumbung' => $dataLumbung
        ]);

        // Simpan file laporan
        $fileName = 'report_' . now()->format('Ymd_His') . '.pdf';
        Storage::put('public/reports/' . $fileName, $pdf->output());

        // Simpan metadata laporan di database
        Laporan::create([
            'uuid' => Str::uuid(),
            'name' => $fileName,
            'tanggal' => now(),
            'sumber' => 'Sistem',
            'note' => $request->note,
            'status' => 'generated',
            'single_date' => $request->single_date,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'preview' => $fileName
        ]);

        return response()->json(['message' => 'Laporan berhasil dihasilkan', 'file_name' => $fileName]);
    }
}
