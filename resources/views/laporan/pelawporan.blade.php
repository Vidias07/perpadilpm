<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Tabs -->
        <div class="mt-8">
            <ul class="flex border-b border-gray-200">
                <!-- Tab Perpadi -->
                <li class="-mb-px mr-1">
                    <a href="#" id="tab-perpadi"
                        class="bg-white inline-block py-2 px-4 font-semibold border-b-2 border-transparent hover:border-blue-500">
                        Perpadi
                    </a>
                </li>
                <!-- Tab Data LPM -->
                <li class="mr-1">
                    <a href="#" id="tab-lpm"
                        class="bg-white inline-block py-2 px-4 font-semibold border-b-2 border-transparent hover:border-blue-500">
                        Data LPM
                    </a>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="bg-white shadow-md p-4 mt-4">
                <!-- Tab Perpadi content -->
                <div id="perpadi-content" class="block">
                    <strong class="mb-5">
                        <h1>Data Perpadi</h1>
                    </strong>
                    <form action="{{ route('laporan.perpadi') }}" method="GET"
                        class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4">
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-2">
                            <label for="start_date_1" class="font-bold md:w-auto">Start Date:</label>
                            <input type="date" id="start_date_1" name="start_date"
                                class="px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <div
                            class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-2">
                            <label for="end_date_1" class="font-bold md:w-auto">End Date:</label>
                            <input type="date" id="end_date_1" name="end_date"
                                class="px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 mt-2 md:mt-0">Generate
                            Report</button>
                    </form>

                    <form action="{{ route('laporan.excel.perpadi') }}" method="GET" class="space-y-4">
                        <div>
                            <label for="start_date" class="block text-gray-700">Start Date:</label>
                            <input type="date" name="start_date" id="start_date"
                                class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                                value="{{ old('start_date') }}">
                            @error('start_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-gray-700">End Date:</label>
                            <input type="date" name="end_date" id="end_date"
                                class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('end_date') }}">
                            @error('end_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Export Excel
                        </button>
                    </form>
                </div>

                <!-- Tab Data LPM content -->
                <div id="lpm-content" class="hidden">
                    <strong>
                        <h1>Data LPM</h1>
                    </strong>

                    <form action="{{ route('laporan.lpm') }}" method="GET"
                        class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4">
                        <div
                            class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-2">
                            <label for="start_date_2" class="font-bold md:w-auto">Start Date:</label>
                            <input type="date" id="start_date_2" name="start_date"
                                class="px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <div
                            class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-2">
                            <label for="end_date_2" class="font-bold md:w-auto">End Date:</label>
                            <input type="date" id="end_date_2" name="end_date"
                                class="px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 mt-2 md:mt-0">Generate
                            Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk meng-handle perpindahan tab dan set tab Perpadi sebagai default -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap semua elemen tab
            const tabs = document.querySelectorAll('ul.flex > li > a');

            // Menangkap konten dari tab perpadi dan lpm
            const perpadiContent = document.getElementById('perpadi-content');
            const lpmContent = document.getElementById('lpm-content');

            // Menampilkan tab Perpadi dan menyembunyikan tab LPM secara default
            perpadiContent.classList.remove('hidden');
            lpmContent.classList.add('hidden');

            // Menandai tab Perpadi sebagai tab aktif secara default
            document.getElementById('tab-perpadi').classList.add('border-blue-500');

            // Iterasi setiap tab dan menambahkan event listener ketika diklik
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Menghapus class 'border-blue-500' dari tab yang sudah ada dan menambahkan class 'border-transparent'
                    tabs.forEach(tab => tab.classList.remove('border-blue-500'));
                    tabs.forEach(tab => tab.classList.add('border-transparent'));

                    // Menambahkan class 'border-blue-500' ke tab yang sedang diklik
                    tab.classList.remove('border-transparent');
                    tab.classList.add('border-blue-500');

                    // Menghapus class 'hidden' dari konten yang ditampilkan berdasarkan tab yang diklik
                    if (tab.id === 'tab-perpadi') {
                        perpadiContent.classList.remove('hidden');
                        lpmContent.classList.add('hidden');
                    } else if (tab.id === 'tab-lpm') {
                        lpmContent.classList.remove('hidden');
                        perpadiContent.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</x-app-layout>
