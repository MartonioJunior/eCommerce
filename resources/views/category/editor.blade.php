<div class="card" id="category">
  <div class="row card-header">
    <h3 class="text-center font-weight-bold text-uppercase col-md-6">Gerenciamento de Categorias</h3>
    <div class="col-md-3"><button class="col-md-12 btn btn-primary add-category">Adicionar</button></div>
    <div class="col-md-3"><a href="/admin/profile#tableCategory" class="col-md-12 btn btn-secondary">Cancelar</a></div>
  </div>
  <div class="card-body">
    <div id="categoryTable" class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Salvar</th>
            <th scope="col" class="text-center">Remover</th>
          </tr>
        </thead>
        <tbody>
          @include('category.edit', ['attr' => "hidden"])
          @each('category.edit', $categories, 'category')
        </tbody>
      </table>
    </div>
  </div>
</div>