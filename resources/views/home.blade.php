<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        <livewire:new-trott-form />
        <livewire:timeline :userId="Auth::id()"/>
    </div>
</x-layouts.three-columns>
