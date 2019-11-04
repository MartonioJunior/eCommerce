<form id="C{{ $category->id ?? "-1" }}" action="/category/{{ $category->id ?? "-1" }}/save" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <tr {{ $attr ?? "" }}>
    <th scope="row">{{ $category->id ?? "New" }}</th>
    <td><input type="text" name="category{{ $category->id ?? "-1" }}description" placeholder="Descrição" value="{{ $category->description ?? "Descrição" }}"></td>
    <td>
      <input form="C{{ $category->id ?? "-1" }}" class="btn btn-success" type="submit" value="Salvar">
    </td>
    <td>
      <span class="table-remove">
        <a href="/category/{{ $category->id ?? "-1" }}/delete" class="btn btn-danger btn-rounded btn-sm my-0">Remover</a>
      </span>
    </td>
  </tr>
</form>