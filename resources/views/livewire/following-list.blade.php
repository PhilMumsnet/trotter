<div class="p-6">
    <h1 class="font-bold text-4xl block mb-4">Following</h1>
    @foreach ($follows as $follow)
        <livewire:following-summary :user="$follow" :key="$follow->id" />
    @endforeach
</div>
