@extends('base')

@section('content')
	<div class="col-lg-12 center">
		<div class="row my-4">
		<h1 class="col-md-10"><b>Meu Perfil</b></h1>
		<a href="/auth/logout" class="btn btn-secondary col-md-2 h-50">Sair da Conta</a>
	</div>
	<div class="row my-4 card">
		<div class="col-md-12 my-4">
			<form action="{{ url('client/update') }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
    			
				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nome</label>
			        <div class="col-md-10">
			            <input type="text" name="nome" class="form-control" value="Marcos" placeholder="Nome">
			        </div>
			    </div>
			    <div class="row form-group">
			    	<label for="name" class="col-sm-2 control-label">Email</label>
			    	<div class="col-md-10">
		            	<input type="email" name="email" class="form-control" placeholder="Email" value="marcos@gmail.com">
		            </div>
		        </div>				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="senha" class="form-control" value="12345" placeholder="Senha">
			        </div>
			    </div>
			    <div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Confirmar Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="novaSenha" class="form-control" value="12345" placeholder="Nova senha">
			        </div>
			    </div>
				<a href="/client/edit">
					<h5 type="submit" class="btn btn-primary btn-block btn-flat">Atualizar Perfil</h5>
				</a>
			</form>
		</div>
	</div>
	@include('admin.revenue')
	@include('purchase.editor')
	@include('product.editor')
	@include('category.editor')
	@include('client.show')
	<h1 class="my-4"><b>Produtos não disponíveis</b></h1>
	<div class="row col-lg-12 center">
		@include('product.display')
		@include('product.display')
		@include('product.display')
		@include('product.display')
	</div>
@endsection