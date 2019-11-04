<div {{ $attr ?? "" }} class="p-1" id="category{{ $category->id ?? "-1" }}">
	<input type="hidden" name="product_id" value="{{ $product->id ?? "-1" }}">
	<input type="hidden" name="category[]" value="{{ $category->id ?? "-1" }}">
	<button class="col-md-12 btn btn-success bg-info rounded text-center remove-category-from-product">{{ $category->description ?? "" }}</button>
</div>