<div class="m-8">
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="mt-4">
        <x-label for="user" value="Select User" class="block font-medium text-sm text-gray-700" />

        <select id="user" wire:model="selectedUser"
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select a User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('selectedUser')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="roles" value="Select Roles" class="block font-medium text-sm text-gray-700" />


        <div class="inline-block relative w-full">
            <select id="roles" wire:model="selectedRoles" multiple
                class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select a Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>

            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        @error('selectedRoles')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <x-button wire:click="assignRoles"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">Assign
            Roles</x-button>
    </div>
</div>
