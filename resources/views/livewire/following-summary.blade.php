<div class="flex items-center mt-2">
    <a class="flex-1 flex" href="{{ route('profile', $user->username) }}">
        <img class="rounded-full mr-2" src="{{ Gravatar::src($user->email, 50) }}">
        <div  class="flex-1">
            <div class="font-bold">
                {{ $user->name }}
            </div>
            <div class="text-gray-500">
                &#64;{{ $user->username }}
            </div>
        </div>
    </a>
    <button class="bg-red-300 rounded-full py-2 px-4" wire:click="unfollow">Unfollow</button>
</div>
