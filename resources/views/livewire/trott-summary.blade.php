<div class="border-black-400 border-b-2 p-2">
    <h2>
        <span class="font-bold">{{ $trott->user->name}}</span><span class="text-gray-400"> - {{ $trott->updated_at->longAbsoluteDiffForHumans() }}</span>
    </h2>
    <p class="prose">
        {{ $trott->body }} 
    </p>
</div>
