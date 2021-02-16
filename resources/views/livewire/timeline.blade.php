<div>
    @foreach ($trotts as $trott)
        <livewire:trott-summary :trott="$trott" :key="$trott->id" />
    @endforeach
</div>
