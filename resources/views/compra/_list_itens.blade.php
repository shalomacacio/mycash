      
      <table class="table table-bordered table-striped" id="itens-table">
        <thead>
         <tr>
          <th><a>PRODUTO</a></th>
          <th><a>PREÇO</a></th>
          <th><a>QTD</a></th>
          <th><a>SUBTOTAL</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($compra->produtos as $l)
            <td>{!! $l->nome!!}</td>
            <td>{!! $l->pivot->preco_compra!!}</td>
            <td>{!! $l->pivot->qtd!!}</td>
            <td>{!! $l->pivot->subtotal!!}</td>
            <td>
              <a href="{{route('compra.delItem', [$compra->id, $l->id])}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>