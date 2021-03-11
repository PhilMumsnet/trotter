<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div class='grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4 p-4'>
        @foreach ($users as $user)
            <a href="{{ route('profile', $user->username) }}">
                <img class="rounded-full mr-2 inline" src="{{ Gravatar::src($user->email, 60) }}">
                <span class="text-sm">{{ $user->name }}</span>
            </a>
        @endforeach
    </div>
</x-layouts.three-columns>
