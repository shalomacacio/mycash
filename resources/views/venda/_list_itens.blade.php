      
      <table class="table table-bordered table-striped" id="itens-table"  
      >
        <thead>
         <tr>
          <th><a>PRODUTO</a></th>
          <th><a>PREÇO</a></th>
          <th><a>QTD</a></th>
          <th><a>DESCONTO</a></th>
          <th><a>SUBTOTAL</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($venda->produtos as $l)
            <td>{!! $l->nome!!}</td>
            <td>{!! $l->pivot->preco_venda!!}</td>
            <td>{!! $l->pivot->qtd!!}</td>
            <td>{!! $l->pivot->desconto!!}</td>
            <td>{!! $l->pivot->subtotal!!}</td>
            <td>
              <a href="{{route('venda.delItem', [$venda->id, $l->id])}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
      
        @endforeach()

        @if($venda->produtos->isNotEmpty())
            <tr>
              <td class="text-danger"><h1>TOTAL</h1></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-danger"><h1>{!! $venda->produtos()->sum('subtotal')!!}</h1></td>
          </tr>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><</td>
              <td> <a href="{{ URL::route('venda.index') }}" class="btn btn-success"> Fechar Pedido</a></td>
          </tr>
        @endif

      </tbody>
    </table>