<div class="border-black-400 border-b-2 p-2">
    <h2>
        <span class="font-bold">{{ $trott->user->name }}</span>
        <span class="text-gray-400"> - {{ $trott->updated_at->longAbsoluteDiffForHumans() }}</span>
    </h2>
    <p class="prose">
        {{ $trott->body }} 
    </p>
    <div class="flex">
        <div class="flex items-center">
            <svg wire:click="like" viewBox="0 0 20 20" class="{{ $trott->isLikedBy(Auth::user()) ? 'text-blue-500' : 'text-gray-400' }} h-5" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M2 10.5C2 9.67157 2.67157 9 3.5 9C4.32843 9 5 9.67157 5 10.5V16.5C5 17.3284 4.32843 18 3.5 18C2.67157 18 2 17.3284 2 16.5V10.5Z"/>
                <path fill="currentColor" d="M6 10.3333V15.7639C6 16.5215 6.428 17.214 7.10557 17.5528L7.15542 17.5777C7.71084 17.8554 8.32329 18 8.94427 18H14.3604C15.3138 18 16.1346 17.3271 16.3216 16.3922L17.5216 10.3922C17.7691 9.15465 16.8225 8 15.5604 8H12V4C12 2.89543 11.1046 2 10 2C9.44772 2 9 2.44772 9 3V3.66667C9 4.53215 8.71929 5.37428 8.2 6.06667L6.8 7.93333C6.28071 8.62572 6 9.46785 6 10.3333Z"/>
            </svg>
            <span class="ml-1">{{ $trott->likes ?? 0 }}</span>
        </div>
        <div class="flex items-center ml-2">
            <svg wire:click="dislike" viewBox="0 0 20 20" class="{{ $trott->isDislikedBy(Auth::user()) ? 'text-blue-500' : 'text-gray-400' }} h-5" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M18 9.5C18 10.3284 17.3285 11 16.5 11C15.6716 11 15 10.3284 15 9.5V3.5C15 2.67157 15.6716 2 16.5 2C17.3285 2 18 2.67157 18 3.5V9.5Z" />
                <path fill="currentColor" d="M14 9.66667V4.23607C14 3.47852 13.572 2.786 12.8945 2.44721L12.8446 2.42229C12.2892 2.14458 11.6767 2 11.0558 2L5.63964 2C4.68628 2 3.86545 2.67292 3.67848 3.60777L2.47848 9.60777C2.23097 10.8453 3.17755 12 4.43964 12H8.00004V16C8.00004 17.1046 8.89547 18 10 18C10.5523 18 11 17.5523 11 17V16.3333C11 15.4679 11.2807 14.6257 11.8 13.9333L13.2 12.0667C13.7193 11.3743 14 10.5321 14 9.66667Z"/>
            </svg>
            <span class="ml-1">{{ $trott->dislikes ?? 0 }}</span>
        </div>
    </div>
</div>
