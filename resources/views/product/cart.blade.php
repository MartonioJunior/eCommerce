<div id="product{{ $product->id }}" class="row card h-25">
    <div class="row card-body h-25">
        <img class="img-fluid col-lg-2 h-25" src="{{ $product->photo }}" alt="">
        <h4 class="card-title col-lg-2 align-self-center">
            <b>{{ $product->name }}</b>
        </h4>
        <h5 id="priceProduct{{ $product->id }}" class="col-lg-2 align-self-center">{{ $product->price }}</h5>
        <div class="row col-lg-4 h-25 align-self-center">
            <button onclick="removeOneFromProduct({{ $product->id }})" class="btn btn-primary">-</button>
            <h5 id="amountProduct{{ $product->id }}" class="col-lg-4 text-center">{{ $product->currentAmount }}</h5>
            <button onclick="addOneToProduct({{ $product->id }})" class="btn btn-primary">+</button>
        </div>
        <h5 id="totalValueProduct{{ $product->id }}" class="col-lg-2 align-self-center"><b>Total</b><br>{{ $product->price * $product->currentAmount }}</h5>
    </div>
</div>