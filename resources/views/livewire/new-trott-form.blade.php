<div class="border-black-400 border-t-2 border-b-2 bg-white p-4 h-72">
    <div class="flex h-full">
        <div class="flex-none">
            <img class="rounded-full mr-2" src="{{ Gravatar::src(Auth::user()->email) }}">
        </div>
        <form wire:submit.prevent="submit" class="h-full flex flex-col flex-1">
            <textarea wire:model.defer="trottBody" class="w-full h-full resize-none border-grey-400 p-4 border-2">
            </textarea>
            <div class="text-right mt-2">
                <button type="submit" class="bg-red-300 rounded-full p-2">Trotts away!!</button>
            </div>
        </form>
    </div>
</div>
