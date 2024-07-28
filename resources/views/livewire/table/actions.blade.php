<div class="flex space-x-2">
    <a href="{{ route('edit.user', ['id' => $id]) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
    <button wire:click="deleteUser({{ $id }})"
        onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"
        class="text-red-600 hover:text-red-900">Delete</button>

</div>
