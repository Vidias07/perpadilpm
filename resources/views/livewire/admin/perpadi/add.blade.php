<div>
    <x-button class="mb-4" @click="$wire.set('modal', true)">Tambah Perpadi</x-button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class=" flex justify-between">
                <div>
                    <h1 class="text-lg font-bold text-gray-800 mb-6">Edit Perpadi</h1>
                </div>
                <div>
             @livewire('master.data-penggilingan.add')
                </div>

            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="search" value="Pencarian Penggilingan" />
                <x-input id="search" type="text" wire:model.debounce.300ms="search" class="block mt-1 w-full" placeholder="Cari Penggilingan..." />
                @if ($showResults && !empty($filteredPenggilingan))
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

            <div class="mt-4">
                <x-label for="harga_gabah" value="Harga Gabah (IDR)" />
                <x-input id="harga_gabah" type="number" step="0.01" wire:model="harga_gabah" class="block mt-1 w-full" />
                @error('harga_gabah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="stok_gabah" value="Stok Gabah (ton)" />
                <x-input id="stok_gabah" type="number" step="0.01" wire:model="stok_gabah" class="block mt-1 w-full" />
                @error('stok_gabah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="harga_beras" value="Harga Beras  (IDR)" />
                <x-input id="harga_beras" type="number" step="0.01" wire:model="harga_beras" class="block mt-1 w-full" />
                @error('harga_beras')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="stok_beras" value="Stok Beras (ton)" />
                <x-input id="stok_beras" type="number" step="0.01" wire:model="stok_beras" class="block mt-1 w-full" />
                @error('stok_beras')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeModal">Cancel</x-button>
            <x-button wire:click="store">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
