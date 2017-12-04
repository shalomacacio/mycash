<div class="box">
  <div class="box-header">
    <h3 class="box-title">Compras </h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="compras-table">
        <thead>
         <tr>
          <th><a>CODIGO</a></th>
          <th><a>LOTE</a></th>
          <th><a>FORNECEDOR</a></th>
          <th><a>NUM PEDIDO</a></th>
          <th><a>TAXA IMPOSTO</a></th>
           <th><a>SITUAÇÃO</a></th>
           <th><a>TOTAL</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <tr>
            <td>{!! $l->codigo !!}</td>
            <td>{!! isset($l->lote->descricao)?$l->lote->descricao : null!!}</td>
            <td>{!!isset($l->fornecedor->descricao)?$l->fornecedor->descricao : null!!} </td>
            <td>{!! $l->num_pedido !!}</td>
            <td>{!! $l->taxa_imposto !!}</td>
            @if($l->flg_concluida === 0)
              <td><span class="label label-danger">pendente</span></td>
            @else
              <td><span class="label label-success">concluída</span></td>
            @endif 
            <td>{!! $l->produtos()->sum('subtotal')  +  $l->taxa_imposto !!} </td>
            <td><a href="{{route('compra.novaCompra', $l->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

