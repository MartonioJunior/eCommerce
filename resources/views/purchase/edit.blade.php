<tr>
  <td contenteditable="false">#{{ $purchase->id }}</td>
  <td contenteditable="false">{{ $purchase->dateOfPurchase() }}</td>
  <td contenteditable="false">R${{ $purchase->getTotalValue() }}</td>
  <td contenteditable="false">{{ $purchase->buyer->name }}</td>
  <td>
    <span class="table-remove">
      <a href="purchase/{{ $purchase->id }}/delete" class="btn btn-danger btn-block btn-flat">Remover</a>
    </span>
  </td>
</tr>