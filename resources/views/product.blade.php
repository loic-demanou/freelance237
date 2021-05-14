<p>liste des produits:</p>
@foreach ($products as $product)
    <p>{{ $product->name }}</p>
@endforeach