<!-- resources/views/laporan/pdf.blade.php -->

<!DOCTYPE html>
<html>

    <head>
        <title>Laporan {{ ucfirst($model) }}</title>
        <style>
            /* Tambahkan style untuk PDF di sini */
        </style>
    </head>

    <body>
        <h1>Laporan {{ ucfirst($model) }}</h1>
        <table>
            <thead>
                <tr>
                    @if ($model === 'perpadi')
                        <th>ID</th>
                        <th>Harga Gabah</th>
                        <th>Stok Gabah</th>
                        <th>Harga Beras</th>
                        <th>Stok Beras</th>
                    @elseif($model === 'lpm')
                        <th>ID</th>
                        <th>Harga Gabah</th>
                        <th>Stok Gabah</th>
                        <th>Harga Beras</th>
                        <th>Stok Beras</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        @if ($model === 'perpadi')
                            <td>{{ $item->penggilingan_id }}</td>
                            <td>{{ $item->harga_gabah }}</td>
                            <td>{{ $item->stok_gabah }}</td>
                            <td>{{ $item->harga_beras }}</td>
                            <td>{{ $item->stok_beras }}</td>
                        @elseif($model === 'lpm')
                            <td>{{ $item->lumbung_id }}</td>
                            <td>{{ $item->harga_gabah }}</td>
                            <td>{{ $item->stok_gabah }}</td>
                            <td>{{ $item->harga_beras }}</td>
                            <td>{{ $item->stok_beras }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
