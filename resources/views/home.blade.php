<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        <livewire:new-trott-form />
        <livewire:timeline :user="Auth::user()"/>
    </div>
</x-layouts.three-columns>
