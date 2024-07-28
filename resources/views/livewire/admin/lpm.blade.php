<div class="m-8">
    <x-button @click="$wire.set('modal',true)">Create LPM</x-button>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif



    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
         
                Edit LPM
            @else
                Create LPM
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="nama_lumbung" value="Nama Lumbung" />
                <x-input id="nama_lumbung" type="text" wire:model="nama_lumbung" class="block mt-1 w-full" />
                @error('nama_lumbung')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="alamat" value="Alamat" />
                <x-input id="alamat" type="text" wire:model="alamat" class="block mt-1 w-full" />
                @error('alamat')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="tahun" value="Tahun" />
                <x-input id="tahun" type="number" wire:model="tahun" class="block mt-1 w-full" />
                @error('tahun')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="bulan" value="Bulan" />
                <x-input id="bulan" type="number" wire:model="bulan" class="block mt-1 w-full" />
                @error('bulan')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="minggu_ke" value="Minggu Ke" />
                <x-input id="minggu_ke" type="number" wire:model="minggu_ke" class="block mt-1 w-full" />
                @error('minggu_ke')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="komoditas" value="Komoditas" />
                <x-input id="komoditas" type="text" wire:model="komoditas" class="block mt-1 w-full" />
                @error('komoditas')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="stok_awal" value="Stok Awal" />
                <x-input id="stok_awal" type="number" wire:model="stok_awal" class="block mt-1 w-full" />
                @error('stok_awal')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="pengadaan" value="Pengadaan" />
                <x-input id="pengadaan" type="number" wire:model="pengadaan" class="block mt-1 w-full" />
                @error('pengadaan')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="penyaluran" value="Penyaluran" />
                <x-input id="penyaluran" type="number" wire:model="penyaluran" class="block mt-1 w-full" />
                @error('penyaluran')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="akhir" value="Akhir" />
                <x-input id="akhir" type="number" wire:model="akhir" class="block mt-1 w-full" />
                @error('akhir')
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
