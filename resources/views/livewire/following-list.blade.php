<div class="p-6">
    <h1 class="font-bold text-4xl block mb-4">Following</h1>
    @forelse ($follows as $follow)
        <livewire:following-summary :user="$follow" :key="$follow->id" />
    @empty
        <div>You aren't following anyone yet...</div>
    @endforelse
</div>
