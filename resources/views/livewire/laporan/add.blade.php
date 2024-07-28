<div>

    <x-button class="mb-4" @click="$wire.set('modal', true)">Tambah Pengajuan</x-button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if ($laporan_id)
                Edit Pengajun
            @else
                Tambah Pengajuan
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" wire:model="name" class="block mt-1 w-full" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="tanggal" value="Tanggal" />
                <x-input id="tanggal" type="date" wire:model="tanggal" class="block mt-1 w-full" />
                @error('tanggal')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="mt-4">
                <x-label for="status" value="Status" />
                <select id="status" wire:model="status"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Pilih Status</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                @error('status')
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
