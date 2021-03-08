<x-layouts.three-columns :title="$title ?? null" :description="$description ?? null">
    <div>
        <livewire:timeline :userId="$user->id"/>
    </div>
</x-layouts.three-columns>
