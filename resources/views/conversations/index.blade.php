<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">Conversations</p>
        </div>
    </header>

    <div class="container mt-3">
        @if ($conversations->count()<=0)
            <div class="col-outlet-4">
                <p  class="font-semibold mb-3">Aucune discussion a votre actif</p>
            </div>
        @else
            <div class="container">
                <p  class="font-semibold mb-3">Cliquer sur un message pour commencer la discussion</p>
            </div>

            @foreach($conversations as $conversation)
            <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
                <div class="flex items-center justify-between px-3 py-8 mb-3 shadow-md rounded mb-3 border-2
                    hover:border-green-300 cursor-pointer">
                    <p class="font-semibold">
                        {{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}
                    </p>
                    <p class="font-thin text-gray-500">
                        envoyé par <strong>{{ auth()->user()->id === $conversation->messages->last()
                        ->user->id ? 'vous' : $conversation->messages->last()->user->name }}</strong> {{ $conversation->messages->last()
                        ->created_at->diffForHumans() }}
                    </p>
                </div>
            </a>
            @endforeach
        @endif
    </div>
    

</x-app-layout>