<div>
    <livewire:user-header :user="$user" />

    @if ($editing)
        <livewire:edit-profile :user="$user" />
    @else
        <livewire:timeline :user="$user" />
    @endif
</div>
