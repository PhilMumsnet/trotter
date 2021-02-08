<x-layouts.master :title="$title ?? null" :description="$description ?? null">
    <div>
        {{ $slot }}
    </div>
</x-layouts.master>
