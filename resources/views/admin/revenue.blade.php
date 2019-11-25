<div class="card" id="revenue">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Receita do eCommmerce</h3>
  <div class="card-body">
    <div class="row">
      <div class="row col-md-5">
        <label for="example-date-input" class="col-2 col-form-label">Do dia: </label><div class="col-10"><input class="form-control" form="moneyRevenue" type="date" value="{{ $start }}" name="startDate"></div>
      </div>
      <div class="row col-md-5">
        <label for="example-date-input" class="col-2 col-form-label">Ao dia: </label><div class="col-10"><input class="form-control" form="moneyRevenue" type="date" value="{{ $end}}" name="endDate"></div>
      </div>
      <div class="row col-md-2">
      <form id="moneyRevenue" action="{{ url('admin/profile/revenue#revenue') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit">
      </form>
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
          @each('revenue.index', $revenues, 'revenue')
        </tbody>
      </table>
    </div>
  </div>
</div>