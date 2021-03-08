<div class="flex items-center mt-2">
    <img class="rounded-full mr-2" src="{{ Gravatar::src($user->email, 50) }}">
    <div  class="flex-1">
        <div class="font-bold">
            {{ $user->name }}
        </div>
        <div class="text-gray-500">
            &#64;{{ $user->username }}
        </div>
    </div>
</div>
