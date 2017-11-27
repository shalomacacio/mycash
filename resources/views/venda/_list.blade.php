<div class="box">
  <div class="box-header">
    <h3 class="box-title">Vendas </h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="compras-table">
        <thead>
         <tr>
          <th><a>CODIGO</a></th>
          <th><a>CLIENTE</a></th>
          <th><a>TIPO PAGAMENTO</a></th>
          <th><a>TOTAL </a></th>
           <th><a>VENDEDOR</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <tr>
            <td>{!! $l->codigo !!}</td>
            <td>{!! $l->lote->descricao!!}</td>
            <td>{!! $l->fornecedor->descricao!!}</td>
            <td>{!! $l->num_pedido !!}</td>
            @if($l->flg_concluida === 0)
              <td><span class="label label-danger">pendente</span></td>
            @else
              <td><span class="label label-success">concluída</span></td>
            @endif 
            <td>{!! $l->produtos()->sum('subtotal') !!}</td>
            <td><a href="{{route('compra.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

