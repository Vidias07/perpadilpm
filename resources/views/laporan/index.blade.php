<!-- resources/views/laporan/index.blade.php -->

<form method="GET" action="{{ route('laporan.generate') }}">
    <label for="model">Pilih Model:</label>
    <select name="model" id="model">
        <option value="perpadi" {{ request('model') === 'perpadi' ? 'selected' : '' }}>Perpadi</option>
        <option value="lpm" {{ request('model') === 'lpm' ? 'selected' : '' }}>LPM</option>
    </select>

    <label for="single_date">Tanggal:</label>
    <input type="date" name="single_date" id="single_date" value="{{ request('single_date') }}">

    <label for="start_date">Tanggal Mulai:</label>
    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">

    <label for="end_date">Tanggal Akhir:</label>
    <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">

    <button type="submit">Generate Report</button>
</form>

@if (isset($laporan))
    <h2>Data {{ ucfirst($model) }}</h2>
    <a href="{{ asset('storage/' . $laporan->preview) }}" target="_blank">Preview Laporan PDF</a>
@endif

@if ($data->isNotEmpty())
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
@else
    <p>Tidak ada data untuk ditampilkan.</p>
@endif
