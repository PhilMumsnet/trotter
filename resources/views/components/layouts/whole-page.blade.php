<x-layouts.master :title="$title ?? null" :description="$description ?? null">
    <main class="bg-green-200">
        {{ $slot }}
    </main>
</x-layouts.master>
