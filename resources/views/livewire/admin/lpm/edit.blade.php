<div class="mx-auto p-4">
    @if ($lpm)
        <div class="bg-white shadow-lg rounded-lg p-8  mx-auto">
            <h1 class="text-lg font-bold text-gray-800 mb-6">Edit LPM</h1>

            <form wire:submit.prevent="updateLpm">
                <div class="mb-6">
                    <label for="search" class="block text-gray-700 text-base font-medium mb-2">Pencarian Lumbung</label>
                    <input id="search" type="text" wire:model.debounce.300ms="search" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari Lumbung..." />

                    @if ($showResults && !empty($filteredLumbung))
                        <ul class="mt-2 border border-gray-300 rounded-lg bg-white shadow-lg max-h-60 overflow-y-auto">
                            @foreach($filteredLumbung as $lumbung)
                                <li @click="$wire.selectLumbung({{ $lumbung->id }})" class="p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200">
                                    {{ $lumbung->nama_lumbung }} - {{ $lumbung->no_telepon }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @error('lumbung_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="lumbung_id" class="block text-gray-700 text-base font-medium mb-2">Lumbung</label>
                    <select disabled id="lumbung_id" wire:model="lumbung_id" class="block  w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Lumbung</option>
                        @foreach($dataLumbungs as $lumbung)
                            <option value="{{ $lumbung->id }}" {{ $lumbung->id == $lumbung_id ? 'selected' : '' }}>
                                {{ $lumbung->nama_lumbung }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga_gabah" class="block text-gray-700 text-base font-medium mb-2">Harga Gabah (IDR)</label>
                        <input id="harga_gabah" type="number" step="0.01" wire:model="harga_gabah" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('harga_gabah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="stok_gabah" class="block text-gray-700 text-base font-medium mb-2">Stok Gabah (ton)</label>
                        <input id="stok_gabah" type="number" step="0.01" wire:model="stok_gabah" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('stok_gabah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="harga_beras" class="block text-gray-700 text-base font-medium mb-2">Harga Beras  (IDR)</label>
                        <input id="harga_beras" type="number" step="0.01" wire:model="harga_beras" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('harga_beras') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="stok_beras" class="block text-gray-700 text-base font-medium mb-2">Stok Beras (ton)</label>
                        <input id="stok_beras" type="number" step="0.01" wire:model="stok_beras" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('stok_beras') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
<div>

</div>

                    <x-button type="submit" >
                        Update LPM
                    </x-button>
                </div>
            </form>
            @livewire('admin.lpm.delete',['lpmId'=>$lpm->id])
        </div>
    @else
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl mx-auto">
            <p class="text-red-500 text-lg font-medium">LPM tidak ditemukan.</p>
        </div>
    @endif
</div>
