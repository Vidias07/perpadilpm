<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold mb-4">Edit Data Lumbung</h2>

    <form wire:submit.prevent="update">
        <div class="space-y-4">
            <div>
                <label for="nama_lumbung" class="block text-sm font-medium text-gray-700">Nama Lumbung</label>
                <x-input id="nama_lumbung" type="text" class="mt-1 block w-full" wire:model.defer="nama_lumbung"
                    placeholder="Nama Lumbung" />
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <x-input id="alamat" type="text" class="mt-1 block w-full" wire:model.defer="alamat"
                    placeholder="Nama Lumbung" />
            </div>
        </div>

        <div class="mt-4 flex justify-between space-x-4">
            <x-danger-button wire:click="confirmDeletion" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
            <x-button type="submit" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>


        </div>
    </form>

    <!-- Delete Confirmation Modal -->
    <x-dialog-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Delete Confirmation') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this item? This action cannot be undone.') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cancelDeletion" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
