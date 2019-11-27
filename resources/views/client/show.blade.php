<h1 class="my-4" id="clientList"><b>Lista de Clientes</b></h1>
<div class="row">
  <div class="row col-md-5">
    <label for="example-date-input" class="col-2 col-form-label">Do dia: </label><div class="col-10"><input class="form-control" form="moneyRevenue" type="date" value="{{ $start }}" name="startDate"></div>
  </div>
  <div class="row col-md-5">
    <label for="example-date-input" class="col-2 col-form-label">Ao dia: </label><div class="col-10"><input class="form-control" form="moneyRevenue" type="date" value="{{ $end }}" name="endDate"></div>
  </div>
  <div class="row col-md-2">
  <form id="moneyRevenue" action="{{ url('admin/profile/revenue#clientList') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input class="btn btn-primary" type="submit">
  </form>
  </div>
</div>
<div class="row my-4">
  @foreach($clients as $client)
    @include('client.index', ['client' => $client, 'start' => $start, 'end' => $end])
  @endforeach
</div>