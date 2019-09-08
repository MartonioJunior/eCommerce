<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Gerenciamento de Compras</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">ID Compra</th>
            <th class="text-center">Data</th>
            <th class="text-center">Total(R$)</th>
            <th class="text-center">Comprador</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Remover</th>
          </tr>
        </thead>
        <tbody>
          @include('purchase.edit')
          @include('purchase.edit')
          @include('purchase.edit')
          @include('purchase.edit')
        </tbody>
      </table>
    </div>
  </div>
</div>