<div>
    <x-button class="mb-4" @click="$wire.set('modal',true)">Tambah Perpadi</x-button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if ($perpadi_id)
                Edit Perpadi
            @else
                Tambah Perpadi
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="nama_penggilingan" value="Nama Penggilingan" />
                <x-input id="nama_penggilingan" type="text" wire:model="nama_penggilingan" class="block mt-1 w-full" />
                @error('nama_penggilingan')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="pemilik" value="Pemilik" />
                <x-input id="pemilik" type="text" wire:model="pemilik" class="block mt-1 w-full" />
                @error('pemilik')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="lokasi" value="Lokasi" />
                <x-input id="lokasi" type="text" wire:model="lokasi" class="block mt-1 w-full" />
                @error('lokasi')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="no_telepon" value="No Telepon" />
                <x-input id="no_telepon" type="text" wire:model="no_telepon" class="block mt-1 w-full" />
                @error('no_telepon')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="harga_gabah" value="Harga Gabah (IDR)" />
                <x-input id="harga_gabah" type="text" wire:model="harga_gabah" class="block mt-1 w-full" />
                @error('harga_gabah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="stok_gabah" value="Stok Gabah (ton)" />
                <x-input id="stok_gabah" type="text" wire:model="stok_gabah" class="block mt-1 w-full" />
                @error('stok_gabah')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="harga_beras" value="Harga Beras  (IDR)" />
                <x-input id="harga_beras" type="text" wire:model="harga_beras" class="block mt-1 w-full" />
                @error('harga_beras')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="stok_beras" value="Stok Beras (ton)" />
                <x-input id="stok_beras" type="text" wire:model="stok_beras" class="block mt-1 w-full" />
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
