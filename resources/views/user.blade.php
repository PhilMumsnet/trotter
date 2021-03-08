<x-layouts.three-columns :title="$user->name" :description="$description ?? null">
    <div>
        <livewire:user-header :user="$user"/>
        <livewire:timeline :userId="$user->id"/>
    </div>
</x-layouts.three-columns>
