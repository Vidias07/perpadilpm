<!-- resources/views/laporan/create.blade.php -->

<form action="{{ route('laporan.store') }}" method="POST">
    @csrf
    <label for="name">Nama:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="tanggal">Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" required><br><br>

    <label for="sumber">Sumber:</label>
    <input type="text" id="sumber" name="sumber" required><br><br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required><br><br>

    <label for="start_date">Tanggal Awal:</label>
    <input type="date" id="start_date" name="start_date" required><br><br>

    <label for="end_date">Tanggal Akhir:</label>
    <input type="date" id="end_date" name="end_date" required><br><br>

    <button type="submit">Submit</button>
</form>
