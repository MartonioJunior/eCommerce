<div class="card" id="product">
  <div class="row card-header py-4">
    <h3 class="text-center font-weight-bold text-uppercase col-md-6">Gerenciamento de Produtos</h3>
    <div class="col-md-3"><button class="col-md-12 btn btn-primary add-product">Adicionar</button></div>
    <div class="col-md-3"><a href="admin/profile#productTable" class="col-md-12 btn btn-secondary">Cancelar</a></div>
  </div>
  <div class="card-body">
    <div id="productTable" class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">Quantidade</th>
            <th scope="col" class="text-center">Preço</th>
            <th scope="col" class="text-center">Descrição</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Foto</th>
            <th scope="col" class="text-center">Salvar</th>
            <th scope="col" class="text-center">Remover</th>
          </tr>
        </thead>
        <tbody>
          @include('product.edit', ['categories' => $categories, 'attr' => "hidden"])
          @foreach ($products as $product)
            @include('product.edit', ['product' => $product, 'categories' => $categories])
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>