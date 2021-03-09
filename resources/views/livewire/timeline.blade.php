<div>
    @forelse ($trotts as $trott)
        <livewire:trott-summary :trott="$trott" :key="$trott->id" />
    @empty
        <div class="border-black-400 border-b-2 p-2">No trotts so far!</div>
    @endforelse
</div>
