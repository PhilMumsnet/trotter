<x-layouts.app :title="$title ?? null" :description="$description ?? null">
    <div>
        <div class="flex flex-row justify-between items-stretch bg-gray-800 h-screen">
            <nav class="bg-white w-1/5">
                <x-partials._sidebar />
            </nav>
            <main class="bg-white flex-1 border-l-2 border-r-2 border-black-400">
                <h1 class="p-3 text-4xl font-bold">{{ $title }}</h1>
                {{ $slot }}
            </main>
            <div class="bg-white w-1/5">
                friends
            </div>
        </div>
    </div>
</x-layouts.app>
