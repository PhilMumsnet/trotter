<div class="flex font-bold items-center">
    <img class="rounded-full mr-2" src="{{ Gravatar::src($user->email, 50) }}">
    {{ $user->name }}
</div>
