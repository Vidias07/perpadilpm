<div>
    <!-- Form for editing or adding Perpadi -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6">
            {{ $perpadi_id ? 'Edit Perpadi' : 'Tambah Perpadi' }}
        </h2>

        <!-- Search and Select Penggilingan -->
        <div class="mb-4">
            <x-label for="search" value="Data Penggilingan" />
            <x-input id="search" type="text" wire:model.debounce.300ms="search" class="block mt-1 w-full" placeholder="Cari Penggilingan..." />
            @if ($filteredPenggilingan && !empty($filteredPenggilingan))
                <ul class="mt-2 border border-gray-300 rounded-lg max-h-60 overflow-y-auto">
                    @foreach($filteredPenggilingan as $penggilingan)
                        <li @click="$wire.selectPenggilingan({{ $penggilingan->id }})" class="p-2 cursor-pointer hover:bg-gray-200">
                            {{ $penggilingan->nama_penggilingan }} - {{ $penggilingan->pemilik }} - {{ $penggilingan->lokasi }}
                        </li>
                    @endforeach
                </ul>
            @endif
            @error('penggilingan_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Harga Gabah (IDR) -->
        <div class="mb-4">
            <x-label for="harga_gabah" value="Harga Gabah (IDR)" />
            <x-input id="harga_gabah" type="number" step="0.01" wire:model="harga_gabah" class="block mt-1 w-full" />
            @error('harga_gabah')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Stok Gabah (ton) -->
        <div class="mb-4">
            <x-label for="stok_gabah" value="Stok Gabah (ton)" />
            <x-input id="stok_gabah" type="number" step="0.01" wire:model="stok_gabah" class="block mt-1 w-full" />
            @error('stok_gabah')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Harga Beras  (IDR) -->
        <div class="mb-4">
            <x-label for="harga_beras" value="Harga Beras  (IDR)" />
            <x-input id="harga_beras" type="number" step="0.01" wire:model="harga_beras" class="block mt-1 w-full" />
            @error('harga_beras')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Stok Beras (ton) -->
        <div class="mb-4">
            <x-label for="stok_beras" value="Stok Beras (ton)" />
            <x-input id="stok_beras" type="number" step="0.01" wire:model="stok_beras" class="block mt-1 w-full" />
            @error('stok_beras')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex justify-between items-center">
            <div>
                @if ($perpadi_id)
                  @livewire('admin.perpadi.delete',['perpadiUuid'=>$perpadi_id])
                @endif
            </div>
            <div>
                <x-button wire:click="submitForm" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-button>
            </div>
        </div>
    </div>
</div>
