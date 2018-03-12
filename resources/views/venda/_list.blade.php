<div class="box">
  <div class="box-header">
    <h3 class="box-title">PEDIDOS </h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="compras-table">
        <thead>
         <tr>
          <th><a>CODIGO PEDIDO</a></th>
          <th><a>QTD ÍTENS</a></th>
          <th><a>TOTAL </a></th>
           <th><a>VENDEDOR</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <tr>
            <td>{!! $l->codigo_venda !!}</td>
            <td>{!! $l->produtos->count()!!}</td>
            <td>{!! $l->produtos()->sum('subtotal')!!}</td>
            <td color='#ff0606'>{!! $l->user->name !!}</td>
            <td>
              <a href="{{route('venda.finalizarVenda', $l->id)}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
              <a href="{{route('venda.novoPedido', $l->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
              <a href="{{route('venda.novoPedido', $l->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

