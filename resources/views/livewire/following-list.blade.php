<div class="p-6">
    <h1 class="font-bold text-4xl block mb-4">Following</h1>
    @foreach (Auth::user()->follows as $following)
        <livewire:following-summary :user="$following" :key="$following->id" />
    @endforeach
</div>
