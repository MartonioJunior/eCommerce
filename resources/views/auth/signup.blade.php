@extends('base')

@section('content')

  <div class="row col-md-12">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h1 class="my-4">Faça seu cadastro</h1>
      <div class="login-box-msg my-4">
        <form action="{{ url('auth/signup') }}" method="post" enctype="multipart/form-data">
          <input type="hidden" value="{{ csrf_token() }}" name="_token"/>

          <div class="form-group has-feedback">
            <input type="name" name="name" class="form-control" placeholder="Nome">
          </div>

          <div class="form-group has-feedback">
            <input type="name" name="endereco" class="form-control" placeholder="Endereço">
          </div>

          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="form-group has-feedback">
            <input type="name" name="login" class="form-control" placeholder="Login">
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Senha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar-se</button>
        </form>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
@endsection