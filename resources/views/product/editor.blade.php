<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Gerenciamento de Produtos</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Nome</th>
            <th class="text-center">ID</th>
            <th class="text-center">Preço</th>
            <th class="text-center">Descrição</th>
            <th class="text-center">Categoria</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Remover</th>
          </tr>
        </thead>
        <tbody>
          @include('product.edit')
          @include('product.edit')
          @include('product.edit')
          @include('product.edit')
        </tbody>
      </table>
    </div>
  </div>
</div>