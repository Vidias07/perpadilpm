<div>
    <x-button wire:click="confirmDeletion">
        {{ __('Hapus') }}
    </x-button>

    <x-dialog-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Hapus Data Lpm') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah Anda yakin ingin menghapus data Lpm ini? Tindakan ini tidak dapat dikembalikan.') }}
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                {{ __('Batalkan') }}
            </x-button>

            <x-button class="ml-2" wire:click="deleteLpm" wire:loading.attr="disabled">
                {{ __('Hapus') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
