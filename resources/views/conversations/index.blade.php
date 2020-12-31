
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Conversations</p>
        </h2>
    </x-slot>
    <div class="container mt-3">

        <div class="container">
            <p  class="font-semibold mb-3">Cliquer sur un message pour commencer la discussion</p>
        </div>


        @foreach($conversations as $conversation)
        <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
          <div class="flex items-center justify-between px-3 py-10 mb-3 shadow-md rounded mb-3 border-2
           hover:border-green-300 cursor-pointer">
                <p class="font-semibold">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}
                </p>
                
                <p class="font-thin text-gray-500">envoyé par <strong>{{ auth()->user()->id === $conversation->messages->last()
                ->user->id ? 'vous' : $conversation->messages->last()->user->name }}</strong> {{ $conversation->messages->last()
                ->created_at->diffForHumans() }}</p>
          </div>
        </a>
        @endforeach
          </div>
    

</x-app-layout>