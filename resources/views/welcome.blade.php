@extends('base')

@section('content')
    <div class="row">
        <h1 class="my-4">Página Inicial</h1>
    </div>
    <div class="row col-lg-12 center">
        @each('product.display', $products, 'product')
    </div>
@endsection