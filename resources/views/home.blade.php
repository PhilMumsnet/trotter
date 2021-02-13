<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        @foreach ($trotts as $trott)
            <p>{{ $trott->user->name}} - {{ $trott->body }}</p>
        @endforeach
    </div>
</x-layouts.three-columns>
