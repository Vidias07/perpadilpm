<?php

namespace App\Http\Controllers;
use App\Models\Attachment;
use App\Models\Laporan;
use App\Models\Lpm;
use App\Models\Perpadi;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PerpadiExport;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.pelaporan', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tanggal' => 'required|date',
            'sumber' => 'required|string',
            'date_filter_type' => 'required|string|in:single,date_range',
            'single_date' => 'nullable|date',
            'start_date' => 'nullable|date|required_if:date_filter_type,date_range',
            'end_date' => 'nullable|date|after_or_equal:start_date|required_if:date_filter_type,date_range',
        ]);

        $laporan = Laporan::create([
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'sumber' => $request->sumber,
            'start_date' => $request->date_filter_type === 'date_range' ? $request->start_date : null,
            'end_date' => $request->date_filter_type === 'date_range' ? $request->end_date : null,
            'single_date' => $request->date_filter_type === 'single' ? $request->single_date : null,
            'note' => '',

        ]);

        return redirect()->back();
    }

    private function generatePreviewLink($sumber, $startDate, $endDate, $singleDate = null, $dateFilterType)
    {
        $routeName = $sumber === 'perpadi' ? 'laporan.preview.range.perpadi' : 'laporan.preview.range.lpm';
        return route($routeName, [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'single_date' => $singleDate,
            'date_filter_type' => $dateFilterType,
        ]);
    }

    public function perpadiReport($request)
    {

        $laporan = Laporan::find($request);

        // Periksa jika $laporan ada
        if (!$laporan) {
            // Tangani kasus jika laporan tidak ditemukan
            return response()->json(['message' => 'Laporan not found'], 404);
        }

        $singleDate = $laporan->single_date;
        $startDate = $laporan->start_date;
        $endDate = $laporan->end_date;


        $query = Perpadi::query();


        if (!empty($singleDate)) {
            $query->whereDate('created_at', $singleDate);
        } elseif (!empty($startDate) && !empty($endDate)) {
            $startDateTime = $startDate . ' 00:00:00';
            $endDateTime = $endDate . ' 23:59:59';
            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        } else {
            return response()->json(['message' => 'No date criteria provided'], 400);
        }

        // Ambil hasil query
        $laporan = $query->get();

        $kabid = User::where('email', 'kabid@lpm.com')->latest()->first();
        $ttd = Attachment::where('user_id', $kabid->id)->latest()->first();
        $status = Laporan::where('status', 'approved')->where('id',$request)->first();
        $isLaporan = Laporan::find($request);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('perpadi.pdf', compact('laporan', 'ttd', 'status', 'kabid','isLaporan'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $pdfPath = public_path('perpadi.pdf');
        file_put_contents($pdfPath, $dompdf->output());
        
        // Tampilkan preview
        return view('perpadi.preview', ['pdfPath' => asset('perpadi.pdf')]);
    }

    public function lpmReport($request)
    {
        $laporan = Laporan::find($request);

        // Periksa jika $laporan ada
        if (!$laporan) {
            // Tangani kasus jika laporan tidak ditemukan
            return response()->json(['message' => 'Laporan not found'], 404);
        }

        $singleDate = $laporan->single_date;
        $startDate = $laporan->start_date;
        $endDate = $laporan->end_date;


        $query = Lpm::query();


        if (!empty($singleDate)) {
            $query->whereDate('created_at', $singleDate);
        } elseif (!empty($startDate) && !empty($endDate)) {
            $startDateTime = $startDate . ' 00:00:00';
            $endDateTime = $endDate . ' 23:59:59';
            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        } else {
            return response()->json(['message' => 'No date criteria provided'], 400);
        }

        // Ambil hasil query
        $laporan = $query->get();

        $kabid = User::where('email', 'kabid@lpm.com')->latest()->first();
        $ttd = Attachment::where('user_id', $kabid->id)->latest()->first();
        $status = Laporan::where('status', 'approved')->where('id',$request)->first();
        $isLaporan = Laporan::find($request);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('lpm.pdf', compact('laporan', 'ttd', 'status','isLaporan', 'kabid'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $pdfPath = public_path('lpm.pdf');
        file_put_contents($pdfPath, $dompdf->output());

        // Tampilkan preview
        return view('lpm.preview', ['pdfPath' => asset('lpm.pdf')]);
    }


}
