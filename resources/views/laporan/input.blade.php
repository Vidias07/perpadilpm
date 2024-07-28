<!-- resources/views/laporan/input.blade.php -->

<form method="POST" action="{{ route('laporan.generate') }}">
    @csrf
    <label for="model">Pilih Model:</label>
    <select name="model" id="model">
        <option value="perpadi">Perpadi</option>
        <option value="lpm">LPM</option>
    </select>

    <label for="single_date">Tanggal:</label>
    <input type="date" name="single_date" id="single_date" value="{{ old('single_date') }}">

    <label for="start_date">Tanggal Mulai:</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">

    <label for="end_date">Tanggal Akhir:</label>
    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">

    <button type="submit">Generate Report</button>
</form>
