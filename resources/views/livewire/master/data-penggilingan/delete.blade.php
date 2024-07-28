<div class="">
    <!-- Delete button -->
    <x-danger-button wire:click="confirmDeletion" wire:loading.attr="disabled">
        {{ __('Delete') }}
    </x-danger-button>

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
