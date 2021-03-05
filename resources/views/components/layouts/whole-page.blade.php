<x-layouts.master :title="$title ?? null" :description="$description ?? null">
    <main>
        {{ $slot }}
    </main>
</x-layouts.master>
