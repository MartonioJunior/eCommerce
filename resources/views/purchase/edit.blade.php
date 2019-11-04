<tr>
  <td contenteditable="false">#{{ $purchase->id }}</td>
  <td contenteditable="false">{{ $purchase->CREATED_AT }}</td>
  <td contenteditable="false">R${{ $purchase->totalValue }}</td>
  <td contenteditable="false">{{ $purchase->buyer->name }}</td>
  <td>
    <span class="table-remove">
      <a href="purchase/{{ $purchase->id }}/delete" class="btn btn-danger btn-block btn-flat">Remover</a>
    </span>
  </td>
</tr>