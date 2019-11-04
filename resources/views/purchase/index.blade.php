<div class="row my-4">
	<h3 class="col-md-9">Compra #{{ $purchase->id }}</h3>
	<h4 class="col-md-3">{{ $purchase->CREATED_AT }}</h4>
</div>
@each('product.purchase', $purchase->products, 'product')
<div class="row card-body h-10">
    <h4 class="card-title col-lg-6 align-self-center">
        <b>Valor Total</b>
    </h4>
    <h4 class="col-lg-6 align-self-center">R${{ $purchase->totalValue() }}</h4>
</div>