<div>
    <!-- Button to Open Modal -->
    <x-button @click="$wire.openModal()" class="mb-4">
        Tambah Lumbung
    </x-button>

    <!-- Modal -->
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Tambah Lumbung
        </x-slot>

        <x-slot name="content">
            <!-- Nama Lumbung -->
            <div class="mb-4">
                <x-label for="nama_lumbung" value="Nama Lumbung" />
                <x-input id="nama_lumbung" type="text" wire:model.defer="nama_lumbung" class="mt-1 block w-full" />
                <x-input-error for="nama_lumbung" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-label for="alamat" value="Alamat" />
                <x-input id="alamat" type="text" wire:model.defer="alamat" class="mt-1 block w-full" />
                <x-input-error for="alamat" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button wire:click="addLumbung" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif
</div>
