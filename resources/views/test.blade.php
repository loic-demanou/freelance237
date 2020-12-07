{{-- @extends('layouts.app')

@section('content')

<p>le test des sections avec blade</p>
@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new freelance mission') }}
        </h2>
    </x-slot>
    <p>le test des sections avec blade</p>
</x-app-layout>
