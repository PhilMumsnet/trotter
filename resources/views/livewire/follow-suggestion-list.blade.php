<div class="p-6">
    <h1 class="font-bold text-4xl block mb-4">Who to follow</h1>
    @foreach ($suggestions as $suggestion)
        <livewire:follow-suggestion :suggestion="$suggestion" :key="$suggestion->id" />
    @endforeach
</div>
