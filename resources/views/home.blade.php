<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        <livewire:new-trott-form />
        
        @foreach ($trotts as $trott)
            <livewire:trott-summary :trott="$trott" />
        @endforeach
    </div>
</x-layouts.three-columns>
