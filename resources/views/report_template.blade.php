<!DOCTYPE html>
<html>

    <head>
        <title>Laporan</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <h1>Laporan Data Penggilingan dan Lumbung</h1>

        <h2>Data Penggilingan</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Penggilingan</th>
                    <th>Pemilik</th>
                    <th>Lokasi</th>
                    <th>No Telepon</th>
                    <th>Harga Gabah</th>
                    <th>Stok Gabah</th>
                    <th>Harga Beras</th>
                    <th>Stok Beras</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPenggilingan as $penggilingan)
                    @foreach ($penggilingan->perpadi as $perpadi)
                        <tr>
                            <td>{{ $penggilingan->nama_penggilingan }}</td>
                            <td>{{ $penggilingan->pemilik }}</td>
                            <td>{{ $penggilingan->lokasi }}</td>
                            <td>{{ $penggilingan->no_telepon }}</td>
                            <td>{{ $perpadi->harga_gabah }}</td>
                            <td>{{ $perpadi->stok_gabah }}</td>
                            <td>{{ $perpadi->harga_beras }}</td>
                            <td>{{ $perpadi->stok_beras }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <h2>Data Lumbung</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Lumbung</th>
                    <th>Harga Gabah</th>
                    <th>Stok Gabah</th>
                    <th>Harga Beras</th>
                    <th>Stok Beras</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataLumbung as $lumbung)
                    @foreach ($lumbung->lpm as $lpm)
                        <tr>
                            <td>{{ $lumbung->nama_lumbung }}</td>
                            <td>{{ $lpm->harga_gabah }}</td>
                            <td>{{ $lpm->stok_gabah }}</td>
                            <td>{{ $lpm->harga_beras }}</td>
                            <td>{{ $lpm->stok_beras }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </body>

</html>
