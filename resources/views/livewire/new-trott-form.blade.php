    <form wire:submit.prevent="submit" class="h-full p-6 rounded-3xl border-black border-2 bg-white flex flex-col">
        <textarea wire:model.defer="trottBody" class="w-full resize-none">
        </textarea>
        <button type="submit" class="bg-red-300">Trotts away!!</button>
    </form>
