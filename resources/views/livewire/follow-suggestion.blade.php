<div class="flex font-bold items-center">
    <img class="rounded-full mr-2" src="{{ Gravatar::src($suggestion->email, 50) }}">
    {{ $suggestion->name }}
</div>
