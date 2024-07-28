<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan LPM</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                padding: 10px;
                /* Adjusted padding */
                position: relative;
                page-break-after: always;
            }

            .last-page {
                page-break-after: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 10px;
                /* Adjusted margin */
            }

            th,
            td {
                border: 1px solid #000;
                padding: 4px;
                /* Adjusted padding */
                text-align: center;
                white-space: normal;
                /* Added property for wrapping */
                word-wrap: break-word;
                /* Added property for word wrapping */
                word-break: break-all;
                /* Added property for word breaking */
            }

            th {
                background-color: #f2f2f2;
            }

            .title {
                text-align: center;
                font-size: 20px;
                /* Adjusted font size */
                font-weight: bold;
                margin-bottom: 10px;
                /* Adjusted margin */
            }

            .subtitle {
                text-align: center;
                font-size: 16px;
                /* Adjusted font size */
                font-weight: bold;
                margin-bottom: 5px;
                /* Adjusted margin */
            }

            .date {
                text-align: center;
                font-size: 14px;
                /* Adjusted font size */
                margin-bottom: 5px;
                /* Adjusted margin */
            }

            .footer {
                position: absolute;
                bottom: 20px;
                left: 20px;
                font-size: 12px;
            }

            .signature {
                text-align: right;
                margin-top: 15px;
                /* Adjusted margin */
            }
        </style>
    </head>

    <body>
        <?php
        // Parse the tanggal as a Carbon instance with Indonesian locale
        $tanggal = \Carbon\Carbon::parse($isLaporan->tanggal)->locale('id');

        // Calculate the week number in the month for the report date
        $mingguKe = ceil($tanggal->day / 7);

        // Format the current date to 'j F Y'
        $nowFormatted = \Carbon\Carbon::now()->locale('id')->translatedFormat('j F Y');
        ?>


        <?php $chunkedLaporan = $laporan->chunk(9); ?>
        @foreach ($chunkedLaporan as $key => $chunk)
            <div class="container {{ $key === $chunkedLaporan->keys()->last() ? 'last-page' : '' }}">
                <div class="title">LAPORAN LPM</div>
                <div class="subtitle">KABUPATEN BULELENG</div>


                <div class="date">
                    Minggu ke-{{ $mingguKe }} Bulan
                    {{ $tanggal->translatedFormat('F') }}<br>{{ $tanggal->translatedFormat('j F Y') }}
                </div>


                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Lumbung</th>
                            <th rowspan="2">Alamat</th>
                            <th colspan="2">Gabah</th>
                            <th colspan="2">Beras</th>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chunk as $key => $item)
                            <tr>
                                <td>{{ $loop->parent->index * 9 + $loop->index + 1 }}</td>
                                <td>{{ $item->lumbung->nama_lumbung }}</td>
                                <td>{{ $item->lumbung->alamat }}</td>
                                <td>{{ $item->stok_gabah }} ton</td>
                                <td>Rp. {{ $item->harga_gabah }}</td>
                                <td>{{ $item->stok_beras }} ton</td>
                                <td>Rp. {{ $item->harga_beras }}</td>
                            </tr>
                        @endforeach
                        @if ($loop->last)
                            <tr>
                                <td colspan="3"><strong>TOTAL</strong></td>
                                <td><strong>{{ $laporan->sum('stok_gabah') }} ton</strong></td>
                                <td><strong>Rp. {{ $laporan->sum('harga_gabah') }}</strong></td>

                                <td><strong>{{ $laporan->sum('stok_beras') }} ton</strong></td>
                                <td><strong>Rp. {{ $laporan->sum('harga_beras') }}</strong></td>

                            </tr>
                        @endif
                    </tbody>
                </table>

                @if ($loop->last)
                    <div class="signature">
                        <p>Buleleng, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('j F Y') }}</p>

                        @if (isset($status) && $status->status === 'approved')
                        <img style="height: 45px"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(storage_path('app/public/' . $ttd->signature))) }}"
                            alt="Signature">
                            @endif
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                NIP : {{ auth()->user()->NIP }}
                            </p>
                        </div>

                    </div>
                @endif

                @if (!$loop->last)
                    <div class="page-break"></div>
                @endif
            </div>
        @endforeach
    </body>

</html>
