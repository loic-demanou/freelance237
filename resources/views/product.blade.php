@extends('layouts.app')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
      <span class="text-green-600">Products</span>
  </h2>
</x-slot>

<p>liste des produits:</p>
@foreach ($products as $product)
    <p>{{ $product->name }}</p>
@endforeach
    
@endsection