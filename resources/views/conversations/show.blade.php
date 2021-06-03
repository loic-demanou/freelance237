<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">Conversations</p>
        </div>
    </header>

    <div class="container mt-3">
        <livewire:conversation :conversation="$conversation">
    </div>
    
</x-app-layout>