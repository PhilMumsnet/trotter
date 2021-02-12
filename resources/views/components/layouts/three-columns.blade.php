<x-layouts.app :title="$title ?? null" :description="$description ?? null">
    <header class="bg-gray-800 text-white p-8 flex items-center">
        <img class="h-24" src="/images/trotter-logo.svg"/>
        <h1 class="text-8xl ml-10">Trotter - {{ $title }}</h1>
    </header>
    <main class="bg-green-200">
        {{ $slot }}
    </main>
</x-layouts.app>
