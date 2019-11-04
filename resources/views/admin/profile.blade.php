@extends('base')

@section('content')
	<div class="col-lg-12 center">
		<div class="row my-4">
		<h1 class="col-md-10"><b>Meu Perfil</b></h1>
	</div>
	<div class="row my-4 card">
		<div class="col-md-12 my-4">
			<form action="{{ url('admin/update') }}" method="POST" enctype="multipart/form-data">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
    			
				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nome</label>
			        <div class="col-md-10">
			            <input type="text" name="nome" class="form-control" value="{{ Auth::user()->name }}" placeholder="Nome">
			        </div>
			    </div>
			    <div class="row form-group">
			    	<label for="name" class="col-sm-2 control-label">Email</label>
			    	<div class="col-md-10">
		            	<input type="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}">
		            </div>
		        </div>				<div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="senha" class="form-control" value="" placeholder="Senha">
			        </div>
			    </div>
			    <div class="row form-group">
			        <label for="name" class="col-sm-2 control-label">Confirmar Nova Senha</label>
			        <div class="col-md-10">
			            <input type="password" name="novaSenha" class="form-control" value="" placeholder="Nova senha">
			        </div>
			    </div>
			    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Atualizar Perfil">
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
		@foreach ($products as $product)
			@if ($product->amountStock <= 0)
				@include('product.index', ['product' => $product])
			@endif
		@endforeach
	</div>
	<h3 class="my-2">Outras opções</h3>
	<a href="{{ url('admin/delete') }}" class="btn btn-danger btn-block btn-flat">Excluir conta</a>
	<div class="py-4"></div>
	<div class="py-4"></div>
@endsection

@section('scripts')
var newIndex = -1;
$(document).ready(function(){
	$(".add-product").click(function(){
		var markup = "#productTable tbody tr";
		$("#productTable tbody").append('<form id="P-1" action="/product/-1/save" method="POST">');
		$("#productTable tbody").append('<tr>'+$(markup).html()+'</tr>');
		$("#productTable tbody").append('</form>');
		console.log($(markup).html());
		newIndex--;
		$(".add-category-to-product").change(addCategory);
	});

	$(".add-category").click(function(){
		var markup = "#categoryTable tbody tr";
		$("#categoryTable tbody").append('<form id="C-1" action="/category/-1/save" method="POST">');
		$("#categoryTable tbody").append('<tr>'+$(markup).html()+'</tr>');
		$("#categoryTable tbody").append("</form>");
	});

	var addCategory = function(){
		var value = $(this).children("option:selected").val();
		var description = $(this).children("option:selected").html();
		var division = $(this).parent().children("#category"+value);
		var productID = $(this).parent().children("#category-1").children(":input[name='product_id']").val();
		console.log(productID);
		if(division.html() != undefined) { return; }
		$(this).parent().append("<div class='p-1' id='category"+value+"'>");
		$(this).parent().append("</div>");
		division = $(this).parent().children("#category"+value);
		var newElement = "<input type='hidden' form='P"+productID+"' name='category[]' value='"+value+"'><button class='col-md-12 btn btn-success bg-info rounded text-center remove-category-from-product'>"+description+"</button>";
		division.append($(newElement));
		division.children(".remove-category-from-product").click(function(){
			console.log($(this).parent().html());
			$(this).parent().remove();
		});
	}
	$(".add-category-to-product").change(addCategory);

	$(".remove-category-from-product").click(function(){
		console.log($(this).parent().html());
		$(this).parent().remove();
	});

	function changePhoto(id) {
		filePath = $("pic"+id).value();
		$("photoP"+id).src(filePath);
	}
});

function add(toProductID, categoryID) {
	
}

function remove(fromProductID, categoryID) {

}

function sendPostRequest(withData,toUrl) {
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': "{{ csrf_token() }}"
	  }
	});
	$.post(toUrl, {data: withData}, function(data,status) {
		console.log('${data} and status is ${status}')
	});
}
// /product/add
// /product/save
// /admin/profile#product
// product/{id}/remove
// /category/add
// /category/save
// /category/{id}/remove
// /admin/profile#category
// /product/{id}/add/{category_id}
// /product/{id}/remove/{category_id}
@endsection