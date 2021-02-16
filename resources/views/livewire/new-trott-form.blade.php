    <div class="border-black-400 border-t-2 border-b-2 bg-white h-40 p-4">
        <form wire:submit.prevent="submit" class="h-full flex flex-col">
            <textarea wire:model.defer="trottBody" class="w-full h-full resize-none">
            </textarea>
            <div class="text-right mt-2">
                <button type="submit" class="bg-red-300 rounded-full p-2">Trotts away!!</button>
            </div>
        </form>
    </div>
