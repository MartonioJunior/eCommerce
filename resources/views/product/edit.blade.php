<form id="P{{ $product->id ?? "-1" }}" action="/product/{{ $product->id ?? "-1" }}/save" enctype="multipart/form-data" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <tr {{ $attr ?? "" }}>
    <th scope="row">{{ $product->id ?? "New" }}</th>
    <td><input form="P{{ $product->id ?? "-1" }}" placeholder="Nome" type="text" name="product{{ $product->id ?? "-1" }}name" value="{{ $product->name ?? "Nome" }}"></td>
    <td><input form="P{{ $product->id ?? "-1" }}" placeholder="Quantidade" type="number" name="product{{ $product->id ?? "-1" }}amountStock" value="{{ $product->amountStock ?? 0 }}"></td>
    <td><input form="P{{ $product->id ?? "-1" }}" placeholder="0.00" type="number" name="product{{ $product->id ?? "-1" }}price" value="{{ $product->price ?? 0.00 }}" step="0.01" min="0"></td>
    <td><textarea form="P{{ $product->id ?? "-1" }}" rows="5" cols="40" placeholder="Descrição" form="P{{ $product->id ?? "-1" }}" name="product{{ $product->id ?? "-1" }}description">{{ $product->description ?? "" }}</textarea></td>
    <td>
      <select class="auto add-category-to-product" id="categorySelect">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{$category->description}}</option>
        @endforeach
      </select>
      @include('category.product_edit', ['category' => NULL, 'attr' => "hidden"])
      @each('category.product_edit', $product->categories ?? [], 'category')
    </td>
    <td>
      <img id="photoP{{ $product->id ?? "-1" }}" class="img-fluid h-25" src="{{ $product->photo ?? "" }}" alt="">
      <input form="P{{ $product->id ?? "-1" }}" class="py-2" type="file" name="photoP{{ $product->id ?? "-1" }}" value="{{ $product->photo ?? "" }}" accept="image/*">
    </td>
    <td>
      <input form="P{{ $product->id ?? "-1" }}" type="submit" class="btn btn-success" value="Salvar">
    </td>
    <td>
      <span class="table-remove">
        <a href="/product/{{ $product->id ?? "-1" }}/delete" class="btn btn-danger btn-block btn-flat delete-product">Remover</a>
      </span>
    </td>
  </tr>
</form>