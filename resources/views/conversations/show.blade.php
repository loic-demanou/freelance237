<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Conversations</p>
        </h2>
    </x-slot>
    <div class="container mt-3">
        <livewire:conversation :conversation="$conversation">
    </div>
    
</x-app-layout>