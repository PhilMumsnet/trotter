<div class="border-black-400 border-t-2 border-b-2 bg-white">
    <div class="relative w-full h-72 bg-black">
        @if ($user->profile_banner)
            <img class="w-full h-72 object-cover" src="{{ asset($user->profile_banner) }}">
        @else
            <img class="w-full h-72 object-cover" src="/storage/profile-banners/default.jpg">
        @endif    

        <img class="absolute rounded-full top-56" src="{{ Gravatar::src($user->email, 120) }}" style="left: calc(50% - 50px)">
    </div>


    <div class="p-4 w-full">
        <div class="flex w-full justify-between items-center">
            <div>
                <div class="font-bold">
                    {{ $user->name }}
                </div>
                <div class="text-gray-500">
                    &#64;{{ $user->username }}
                </div>
            </div>

            <div>
                @if (Auth::id() === $user->id && ! $editing)
                    <button class="bg-red-300 rounded-full py-2 px-4 mr-2" wire:click="editProfile">
                        Edit Profile
                    </button>
                @endif

                @if (Auth::id() !== $user->id)
                    <button class="bg-red-300 rounded-full py-2 px-4" wire:click="follow">
                        @if (Auth::user()->isFollowerOf($user))
                            Unfollow
                        @else
                            Follow
                        @endif
                    </button>       
                @endif     
            </div>
        </div>

        <div class="mt-2 prose">
            {{ $user->profile_introduction }}
        </div>
    </div>
</div>
