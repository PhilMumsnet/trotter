<div class="mt-2 flex items-center">
    <img class="rounded-full mr-2" src="{{ Gravatar::src($suggestion->email, 50) }}">
    <div  class="flex-1">
        <div class="font-bold">
            {{ $suggestion->name }}
        </div>
        <div class="text-gray-500">
            &#64;{{ $suggestion->username }}
        </div>
    </div>
    <button class="bg-red-300 rounded-full py-2 px-4" wire:click="follow">Follow</button>
</div>
