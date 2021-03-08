<div class="mt-2 flex font-bold items-center">
    <img class="rounded-full mr-2" src="{{ Gravatar::src($suggestion->email, 50) }}">
    <span class="flex-1">{{ $suggestion->name }}</span>
    <button class="bg-red-300 rounded-full py-2 px-4" wire:click="follow">Follow</button>
</div>
