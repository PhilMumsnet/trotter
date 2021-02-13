<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        @foreach ($trotts as $trott)
            <x-trott-summary :trott="$trott" />
        @endforeach
    </div>
</x-layouts.three-columns>
