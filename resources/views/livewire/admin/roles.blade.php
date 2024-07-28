<div class="m-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <x-button @click="$wire.openModal()">Create Role</x-button>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="mt-4">
        <x-button wire:click="exportToExcel">Export to Excel</x-button>
        <x-button wire:click="exportToPDF">Export to PDF</x-button>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-button wire:click="edit({{ $role->id }})">Edit</x-button>
                            <x-button wire:click="delete({{ $role->id }})" class="bg-red-500">Delete</x-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $roles->links() }}
    </div>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if ($role_id)
                Edit Role
            @else
                Create Role
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
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeModal">Cancel</x-button>
            <x-button wire:click="store">Save</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
