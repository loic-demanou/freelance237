<div>
    <div class="max-w-1/2 w-1/2 mx-auto">
        <h1 class="text-3xl text-green-500 mb-4">Mission : {{ $conversation->job ?  $conversation->job->title  : "Direct conversation" }}</h1>
        @foreach($conversation->messages as $message)
            <div class="rounded-lg px-3 py-1 mb-2 font-medium
            {{ $message->user->id === auth()->user()->id  ? 'bg-green-500 text-white mr-auto max-w-1/2 w-1/2' : 'ml-auto bg-gray-300 text-gray-700 max-w-1/2 w-1/2'}}">
                <p class="font-light">{{ $message->user->id === auth()->user()->id  ? 'Vous avez dit : ' : $message->user->name . ' a dit :'}}</p>
                <p>{{ $message->content }}</p>
            </div>
        @endforeach
        <textarea wire:keydown.enter.prevent="sendMessage" wire:model="message" class="border rounded px-3 py-4 mt-3 mb-5 shadow-md w-full"></textarea>
    </div>
</div>
