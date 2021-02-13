<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        @foreach ($trotts as $trott)
            <p>{{ $trott->user->name}} - {{ $trott->body }} - {{ $trott->updated_at->diffForHumans() }}</p>
        @endforeach
    </div>
</x-layouts.three-columns>
