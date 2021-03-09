<div class="h-full p-4">
    <h2 class="p-3 text-3xl font-bold">Edit your profile below</h2>

    <form wire:submit.prevent="submit" class="h-full flex flex-col flex-1">
        <label for="intro">Introduction</label>
        @error('user.profile_introduction')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <textarea id="intro" wire:model.defer="user.profile_introduction" class="w-full h-72 resize-none border-2 border-grey-400 p-4 rounded">
        </textarea>
        <div class="text-right mt-2">
            <button type="submit" class="bg-red-300 rounded-full p-2">Save Changes</button>
        </div>
    </form>
</div>
