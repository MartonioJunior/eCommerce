@extends('base')

@section('content')
<div class="row col-lg-12">
	<div class="col-lg-4"></div>
	<div class="col-lg-4 my-4">
		<h1 class="my-4 center">Login ({{ $url }})</h1>
	    <div class="login-box-body">
	    	<div class="login-box-msg">
	    		<form action="{{ route($url . 'Login') }}" method="post" enctype="multipart/form-data">
	    			<input type="hidden" value="{{ csrf_token() }}" name="_token"/>
	    			<div class="form-group has-feedback">
			            <input type="name" name="login" class="form-control" placeholder="Login">
			            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			            <input type="password" name="password" class="form-control" placeholder="Senha">
			            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			        </div>
			        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
	    		</form>
	    		<a href="{{"/signup/".$url}}" class="text-center">Quero me registrar</a>
	    	</div>
	    </div>
    </div>
    <div class="col-lg-4"></div>
</div>
@endsection