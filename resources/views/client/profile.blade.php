@extends('base')

@section('content')
	<div class="row my-4">
		<h1 class="col-md-10"><b>Meu Perfil</b></h1>
	</div>
	<div class="row my-4 card">
		<div class="col-md-12 my-4">
			<form action="{{ url('client/update') }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
    			
				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nome</label>
			        <div class="col-md-10">
			            <input type="text" name="nome" class="form-control" value="{{ Auth::guard('client')->user()->name }}" placeholder="Nome">
			        </div>
			    </div>
			    <div class="row form-group">
			    	<label for="name" class="col-sm-2 control-label">Email</label>
			    	<div class="col-md-10">
		            	<input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::guard('client')->user()->email }}">
		            </div>
		        </div>
			    <div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Endereço</label>
			        <div class="col-md-10">
			            <input type="text" name="endereco" class="form-control" value="{{ Auth::guard('client')->user()->address }}" placeholder="Endereço">
			        </div>
			    </div>
				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="senha" class="form-control" value="" placeholder="Senha">
			        </div>
			    </div>
			    <div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Confirmar Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="novaSenha" class="form-control" value="" placeholder="Senha">
			        </div>
			    </div>
				<a href="/client/edit">
					<h5 type="submit" class="btn btn-primary btn-block btn-flat">Atualizar Perfil</h5>
				</a>
			</form>
		</div>
	</div>
	<h1 class="my-4"><b>Minhas compras</b></h1>
	@include('purchase.show')
	<h3 class="my-2">Outras opções</h3>
	<form action="{{ url('client/delete') }}" method="delete" enctype="multipart/form-data">
		<h5 type="submit" class="btn btn-danger btn-block btn-flat">Excluir conta</h5>
	</form>
	<div class="py-4"></div>
	<div class="py-4"></div>
@endsection