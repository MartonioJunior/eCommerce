<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <img class="card-img-top img-fluid h-50" src="{{ $product->photo }}" alt="">
        <div class="card-body h-75">
            <h3 class="card-title">
                {{ $product->name }}
            </h3>
            @foreach($product->categories() as $category)
                <h4>{{ $category }}</h4>
            @endforeach
            <h5>R${{ $product->price }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            @if($product->amountStock > 0 && !Auth::guard('admin')->check())
                <a href="purchase/{{ $product->id }}/add/1" class="btn btn-primary">Comprar</a>
            @endif
        </div>
        <h5 class="card-footer h-25">{{ $product->amountStock }} restantes</h5>
    </div>
</div>