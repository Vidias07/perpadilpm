<x-app-layout>

    <div x-data="{ activeTab: 'tab1' }" class="w-full mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="border-b-2 border-gray-200">
            <ul class="flex space-x-4">
                <li @click="activeTab = 'tab1'" :class="{ 'border-blue-500 text-blue-500': activeTab === 'tab1' }"
                    class="cursor-pointer py-2 px-4 border-b-4 transition duration-300">
                    Pengajuan
                </li>
                <li @click="activeTab = 'tab2'" :class="{ 'border-blue-500 text-blue-500': activeTab === 'tab2' }"
                    class="cursor-pointer py-2 px-4 border-b-4 transition duration-300">
                    Perpadi
                </li>
                <li @click="activeTab = 'tab3'" :class="{ 'border-blue-500 text-blue-500': activeTab === 'tab3' }"
                    class="cursor-pointer py-2 px-4 border-b-4 transition duration-300">
                    LPM
                </li>
            </ul>
        </div>
        <div class="p-6">
            <div x-show="activeTab === 'tab1'">
                @if (auth()->user()->isAdmin == 1)
                    @php
                        $currentDate = now()->toDateString();
                    @endphp
                    <div class="mx-auto">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="bg-white shadow-md rounded p-4">
                            <h2 class="text-xl font-bold mb-4">Ajukan Laporan</h2>

                            <form action="{{ route('laporan.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                                    <input type="text" id="name" name="name" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4">
                                    <label for="tanggal"
                                        class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                                    <input type="date" id="tanggal" name="tanggal" value="{{ $currentDate }}"
                                        required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4">
                                    <label for="sumber"
                                        class="block text-gray-700 text-sm font-bold mb-2">Sumber:</label>
                                    <select id="sumber" name="sumber" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="">-- Pilih Sumber --</option>
                                        <option value="perpadi">Perpadi</option>
                                        <option value="lpm">LPM</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="date_filter_type"
                                        class="block text-gray-700 text-sm font-bold mb-2">Filter
                                        Tanggal:</label>
                                    <select id="date_filter_type" name="date_filter_type" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        onchange="toggleDateFields(this)">
                                        <option value="single">Single Date</option>
                                        <option value="date_range">Date Range</option>
                                    </select>
                                </div>

                                <div id="single_date_fields" class="mb-4">
                                    <label for="single_date"
                                        class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                                    <input type="date" id="single_date" name="single_date" value=""
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div id="date_range_fields" class="hidden">
                                    <div class="mb-4">
                                        <label for="start_date"
                                            class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                            Mulai:</label>
                                        <input type="date" id="start_date" name="start_date" value=""
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>

                                    <div class="mb-4">
                                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                            Akhir:</label>
                                        <input type="date" id="end_date" name="end_date" value=""
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Ajukan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div x-show="activeTab === 'tab2'">
                @livewire('table.laporan-perpadi-table')
            </div>
            <div x-show="activeTab === 'tab3'">
                @livewire('table.laporan-lpm-table')
            </div>
        </div>
    </div>



    <script>
        function toggleDateFields(select) {
            const singleDateFields = document.getElementById('single_date_fields');
            const dateRangeFields = document.getElementById('date_range_fields');
            if (select.value === 'date_range') {
                singleDateFields.classList.add('hidden');
                dateRangeFields.classList.remove('hidden');
            } else {
                singleDateFields.classList.remove('hidden');
                dateRangeFields.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
