<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold mb-4">Edit Data Penggilingan</h2>

    <form wire:submit.prevent="update">
        <div class="space-y-4">
            <div>
                <label for="nama_penggilingan" class="block text-sm font-medium text-gray-700">Nama Penggilingan</label>
                <x-input id="nama_penggilingan" type="text" class="mt-1 block w-full" wire:model.defer="nama_penggilingan" placeholder="Nama Penggilingan" />
            </div>

            <div>
                <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
                <x-input id="pemilik" type="text" class="mt-1 block w-full" wire:model.defer="pemilik" placeholder="Pemilik" />
            </div>

            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <x-input id="lokasi" type="text" class="mt-1 block w-full" wire:model.defer="lokasi" placeholder="Lokasi" />
            </div>

            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <x-input id="no_telepon" type="text" class="mt-1 block w-full" wire:model.defer="no_telepon" placeholder="No Telepon" />
            </div>
        </div>

        <div class="mt-4 flex flex-row justify-between">
          <div>
            <livewire:master.data-penggilingan.delete :uuid="$uuid" />
          </div>


            <x-button type="submit" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>
        </div>

    </form>
</div>
