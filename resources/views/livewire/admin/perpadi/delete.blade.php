<div>
    <x-button wire:click="confirmDeletion">
        {{ __('Hapus') }}
    </x-button>

    <x-dialog-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Hapus Data Perpadi') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah anda yakin menghapus data perpadi , jika sudah terhapus akan besifat permanen') }}
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                {{ __('Batalkan') }}
            </x-button>

            <x-button class="ml-2" wire:click="deletePerpadi" wire:loading.attr="disabled">
                {{ __('Hapus') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
