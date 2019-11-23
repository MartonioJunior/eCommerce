@extends('base')

@section('content')
<div class="row my-4">
	<h1 class="col-lg-7"><b>Carrinho</b></h1>
	<form class="col-lg-4" action="{{ url('purchase/confirm') }}" method="post">
		<h5 type="submit" class="btn btn-success btn-block btn-flat">Finalizar Compra</h5>
	</form>
</div>
<div class="row col-lg-12">
	@each('product.cart', $products, 'product')
</div>
<div class="row py-4">
	<div class="row col-lg-12">
		<h4 class="card-title col-lg-10 align-self-center">
		    <b>Valor Total</b>
		</h4>
		<h4 class="col-lg-2 align-self-center">R$ {{ $totalValue }}</h4>
	</div>
	<div class="col-lg-7"></div>
</div>
<div class="py-4"></div>
<div class="py-4"></div>
@endsection

@section('scripts')
function getElement(ID) {
	return document.getElementById(ID);
}

function addOneToProduct(productID) {
	var productAmountTag = getElement("amountProduct"+productID);
	productAmountTag.innerHTML = parseInt(productAmountTag.innerHTML) + 1;
	updateTotalValue(productID);
}

function removeOneFromProduct(productID) {
	var productAmountTag = getElement("amountProduct"+productID);
	if (parseInt(productAmountTag.innerHTML) > 1) {
		productAmountTag.innerHTML = parseInt(productAmountTag.innerHTML) - 1;
		updateTotalValue(productID);
	} else {
		var element = document.getElementById("product"+productID);
		console.log(element);
		element.parentNode.removeChild(element);
	}
}

function updateTotalValue(productID) {
	var productTotalValueTag = getElement("totalValueProduct"+productID);
	productTotalValueTag.innerHTML = "<b>Total</b><br>"+
	numeral(
		parseFloat(getElement("priceProduct"+productID).innerHTML) * parseFloat(getElement("amountProduct"+productID).innerHTML)
	).format('$0.00');
}

@endsection