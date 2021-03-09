<div class="border-black-400 border-t-2 border-b-2 bg-white p-4">
    <div class="flex items-end w-full justify-between">
        <img class="rounded-full mr-2" src="{{ Gravatar::src($user->email, 100) }}">

        <div>
            @if (Auth::id() === $user->id && ! $editing)
                <button class="bg-red-300 rounded-full py-2 px-4 mr-2" wire:click="editProfile">
                    Edit Profile
                </button>
            @endif

            <button class="bg-red-300 rounded-full py-2 px-4" wire:click="follow">
                @if (Auth::user()->isFollowerOf($user))
                    Unfollow
                @else
                    Follow
                @endif
            </button>
        </div>
    </div>

    <div class="mt-2">
        <div class="font-bold">
            {{ $user->name }}
        </div>
        <div class="text-gray-500">
            &#64;{{ $user->username }}
        </div>
    </div>

    <div class="mt-2 prose">
        {{ $user->profile_introduction }}
    </div>
</div>
