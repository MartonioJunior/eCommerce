<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Receita do eCommmerce</h3>
  <div class="card-body">
    <div class="row">
      <div class="row col-md-6">
        <label for="example-date-input" class="col-2 col-form-label">Do dia: </label><div class="col-10"><input class="form-control" type="date" value="2019-09-07" id="example-date-input"></div>
      </div>
      <div class="row col-md-6">
        <label for="example-date-input" class="col-2 col-form-label">Ao dia: </label><div class="col-10"><input class="form-control" type="date" value="2019-09-07" id="example-date-input"></div>
      </div>
    </div>
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Data</th>
            <th class="text-center">Total(R$)</th>
          </tr>
        </thead>
        <tbody>
          @include('revenue.index')
          @include('revenue.index')
          @include('revenue.index')
          @include('revenue.index')
        </tbody>
      </table>
    </div>
  </div>
</div>