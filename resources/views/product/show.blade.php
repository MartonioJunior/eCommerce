@extends('base')

@section('content')
<h1 class="my-4">Lista de Produtos</h1>
<div class="row col-lg-12 center">
	@each('product.display', $products, 'product')
</div>
@endsection