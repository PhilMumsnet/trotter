<x-layouts.app :title="$title ?? null" :description="$description ?? null">
    <header class="bg-gray-800 text-white p-8 flex items-center">
        <img class="h-24" src="/images/trotter-logo.svg"/>
        <h1 class="text-8xl ml-10">Trotter - {{ $title }}</h1>
    </header>
    <div>
        <div class="flex flex-row justify-between items-stretch bg-gray-800 h-screen">
            <nav class="bg-gray-500 w-1/4">
                nav bar
            </nav>
            <main class="bg-red-500 flex-1">
                {{ $slot }}
            </main>
            <div class="bg-gray-500 w-1/4">
                friends
            </div>
        </div>
    </div>
</x-layouts.app>
