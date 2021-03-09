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

        <div>
            <label for="name">Name</label>

            <div>
                <input id="name" type="text" wire:model.defer="user.name" class="w-full p-2 border-2 border-grey-400 mt-1" name="name">

                @error('user.name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="username">Username</label>

            <div>
                <input id="username" type="text" wire:model.defer="user.username" class="w-full p-2 border-2 border-grey-400 mt-1" name="username">

                @error('user.username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="email">Email</label>

            <div>
                <input id="email" type="email" wire:model.defer="user.email" class="w-full p-2 border-2 border-grey-400 mt-1" name="email">

                @error('user.email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password">Password</label>

            <div>
                <input id="password" type="password" wire:model.defer="password" class="w-full p-2 border-2 border-gray mt-1 " name="password" required>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password-confirm">Confirm Password</label>

            <div>
                <input id="password-confirm" type="password" wire:model.defer="password_confirmation" class="w-full p-2 border-2 border-gray mt-1" name="password_confirmation" required>
            </div>
        </div>

        <div class="text-right mt-2">
            <button type="button" wire:click="cancel" class="bg-red-300 rounded-full p-2">Cancel</button>
            <button type="submit" class="bg-red-300 rounded-full p-2">Save Changes</button>
        </div>
    </form>
</div>
