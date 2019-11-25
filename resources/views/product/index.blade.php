<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <img class="card-img-top img-fluid h-50" src="{{ $product->photo }}" alt="">
        <div class="card-body h-75">
            <h3 class="card-title">
                {{ $product->name }}
            </h3>
            <h4 class="card-title">
                <b>ID: </b>{{ $product->id }}
            </h4>
            <div class="row col-md-12">
                @each('category.index', $product->categories, 'category')
            </div>
            <h5>R${{ $product->price }}</h5>
            <p class="card-text"> {{ $product->description }}</p>
        </div>
    </div>
</div>