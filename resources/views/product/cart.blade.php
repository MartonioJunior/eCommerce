<div class="row card h-25">
    <div class="row card-body h-25">
        <img class="img-fluid col-lg-2 h-25" src="{{ $product->photo }}" alt="">
        <h4 class="card-title col-lg-2 align-self-center">
            <b>{{ $product->name }}</b>
        </h4>
        <h5 class="col-lg-2 align-self-center">R${{ $product->price }}</h5>
        <div class="row col-lg-4 h-25 align-self-center">
            <button class="btn btn-primary">-</button>
            <h5 class="col-lg-2">1</h5>
            <button class="btn btn-primary">+</button>
        </div>
        <h5 class="col-lg-2 align-self-center"><b>Total</b><br>R$2.99</h5>
    </div>
</div>