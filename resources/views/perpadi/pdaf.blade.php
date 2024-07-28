<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perpadi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .container {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .subtitle {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .date {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">LAPORAN PERPADI</div>
        <div class="subtitle">KABUPATEN BULELENG</div>
        <div class="date">Minggu ke-1 Bulan Desember<br>01 Desember 2023</div>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama Penggilingan</th>
                    <th rowspan="2">Pemilik</th>
                    <th rowspan="2">Lokasi</th>
                    <th rowspan="2">No. Telp.</th>
                    <th colspan="4">Komoditas</th>
                </tr>
                <tr>
                    <th>Stok Beras (ton)</th>
                    <th>Harga Beras  (IDR)</th>
                    <th>Stok Gabah (ton)</th>
                    <th>Harga Gabah (IDR)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Data -->
                <tr>
                    <td>1</td>
                    <td>Nama Penggilingan A</td>
                    <td>Pemilik A</td>
                    <td>Lokasi A</td>
                    <td>1234567890</td>
                    <td>10 ton</td>
                    <td>Rp 5,000</td>
                    <td>20 ton</td>
                    <td>Rp 3,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Nama Penggilingan B</td>
                    <td>Pemilik B</td>
                    <td>Lokasi B</td>
                    <td>0987654321</td>
                    <td>15 ton</td>
                    <td>Rp 6,000</td>
                    <td>25 ton</td>
                    <td>Rp 3,500</td>
                </tr>
                <!-- Total Row -->
                <tr>
                    <td colspan="5"><strong>TOTAL</strong></td>
                    <td><strong>25.00 ton</strong></td>
                    <td></td>
                    <td><strong>45.00 ton</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- Signature Section -->
        <div class="signature">
            <p>Tempat untuk tanda tangan:</p>
            <img src="{{ Storage::url($attachments->signature) }}" alt="Signature" class="border">
            <p>Nama Penerima</p>
        </div>





        <!-- Footer -->
        <div class="footer">
            <p>© 2023 Laporan Perpadi</p>
        </div>
    </div>
</body>

</html>
