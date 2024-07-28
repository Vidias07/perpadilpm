<!-- resources/views/laporan/preview_range.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Preview Laporan dengan Rentang Tanggal</title>
    <style>
        /* CSS styling untuk tampilan laporan */
        /* Sesuaikan dengan kebutuhan desain Anda */
    </style>
</head>

<body>
    <h1>Preview Laporan dengan Rentang Tanggal</h1>

    <!-- Tampilkan laporan dengan rentang tanggal -->
    @foreach ($laporan as $data)
        <div>
            <p>Nama: {{ $data->name }}</p>
            <p>Tanggal: {{ $data->tanggal }}</p>
            <p>Sumber: {{ $data->sumber }}</p>
            <p>Status: {{ $data->status }}</p>
            <a href="{{ $data->preview }}" target="_blank">Preview Laporan</a>
        </div>
        <hr>
    @endforeach

    <!-- Tambahkan tombol kembali atau navigasi lainnya -->
    <a href="{{ route('laporan.index') }}">Kembali</a>
</body>

</html>
