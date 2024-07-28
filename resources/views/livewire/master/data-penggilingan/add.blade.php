<div>
    <x-button wire:click="openModal">
        Add Penggilingan
    </x-button>

    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Add Penggilingan
        </x-slot>

        <x-slot name="content">
            <div>
                <x-label for="nama_penggilingan" value="Nama Penggilingan" />
                <x-input id="nama_penggilingan" type="text" wire:model.defer="nama_penggilingan" class="block mt-1 w-full" />
                <x-input-error for="nama_penggilingan" class="mt-2" />

                <x-label for="pemilik" value="Pemilik" class="mt-4" />
                <x-input id="pemilik" type="text" wire:model.defer="pemilik" class="block mt-1 w-full" />
                <x-input-error for="pemilik" class="mt-2" />

                <x-label for="lokasi" value="Lokasi" class="mt-4" />
                <x-input id="lokasi" type="text" wire:model.defer="lokasi" class="block mt-1 w-full" />
                <x-input-error for="lokasi" class="mt-2" />

                <x-label for="no_telepon" value="No Telepon" class="mt-4" />
                <x-input id="no_telepon" type="text" wire:model.defer="no_telepon" class="block mt-1 w-full" />
                <x-input-error for="no_telepon" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="addPenggilingan" wire:loading.attr="disabled">
                Add
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
