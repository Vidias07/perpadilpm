<form wire:submit.prevent="submit">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" wire:model.defer="name">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" wire:model.defer="tanggal">
        @error('tanggal')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="sumber">Sumber:</label>
        <select id="sumber" wire:model.defer="sumber">
            <option value="perpadi">Perpadi</option>
            <option value="lpm">LPM</option>
        </select>
        @error('sumber')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="note">Note:</label>
        <textarea id="note" wire:model.defer="note"></textarea>
        @error('note')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="status">Status:</label>
        <input type="text" id="status" wire:model.defer="status" value="pending" readonly>
        @error('status')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="single_date">Single Date:</label>
        <input type="date" id="single_date" wire:model.defer="single_date">
        @error('single_date')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" wire:model.defer="start_date">
        @error('start_date')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" wire:model.defer="end_date">
        @error('end_date')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="preview">Preview:</label>
        <input type="text" id="preview" wire:model.defer="preview">
        @error('preview')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>
