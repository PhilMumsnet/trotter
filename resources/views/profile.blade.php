<x-layouts.three-columns :title="$user->name" :description="$description ?? null">
    <div>
        <livewire:user-main :user="$user" />
    </div>
</x-layouts.three-columns>
