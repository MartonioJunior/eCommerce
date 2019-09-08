@extends('base')

@section('content')
<div class="row my-4">
	<h1 class="col-lg-7"><b>Carrinho</b></h1>
	<form class="col-lg-4" action="{{ url('purchase/confirm') }}" method="post">
		<h5 type="submit" class="btn btn-success btn-block btn-flat">Finalizar Compra</h5>
	</form>
</div>
<div class="row col-lg-12">
	@include('product.cart')
	@include('product.cart')
	@include('product.cart')
	@include('product.cart')
	@include('product.cart')
</div>
<div class="row py-4">
	<div class="row col-lg-12">
		<h4 class="card-title col-lg-10 align-self-center">
		    <b>Valor Total</b>
		</h4>
		<h4 class="col-lg-2 align-self-center">R$14.95</h4>
	</div>
	<div class="col-lg-7"></div>
</div>
<div class="py-4"></div>
<div class="py-4"></div>
@endsection