<div class="col-lg-3 col-sm-6 py-2">
    <div class="card hovercard">
        <div class="cardheader bg-primary">
            <h4 class="align-center px-2 py-2 text-white">
                <b>{{ $client->name }}</b>
            </h4>
        </div>
        <div class="info">
            <h5 class="desc py-2 px-2"><b>ID:</b> {{ $client->id }}</h5>
            <h6 class="desc py-2 px-2">{{ $client->getNumberOfPurchasesFrom(strtotime($start), strtotime($end)) }} compras feitas</h6>
        </div>
    </div>

</div>