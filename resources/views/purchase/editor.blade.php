<div class="card">
  <div class="row card-header py-4">
    <h3 class="col-md-6 text-center font-weight-bold text-uppercase">Gerenciamento de Compras</h3>
    <div class="col-md-2"></div>
    <div class="col-md-2"><a href="/category/save" class="col-md-10 btn btn-success">Salvar</a></div>
    <div class="col-md-2"><a href="/admin/profile#category" class="col-md-10 btn btn-secondary">Cancelar</a></div>
  </div>
  <div class="card-body">
    <div id="table" class="table-editable table-responsive-md">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Número da Compra</th>
            <th class="text-center">Data</th>
            <th class="text-center">Total(R$)</th>
            <th class="text-center">Comprador</th>
            <th class="text-center">Remover</th>
          </tr>
        </thead>
        <tbody>
          @each('purchase.edit', $purchases, 'purchase')
        </tbody>
      </table>
    </div>
  </div>
</div>