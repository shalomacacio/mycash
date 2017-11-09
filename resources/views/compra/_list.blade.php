<div class="box">
  <div class="box-header">
    <h3 class="box-title">Compras Pendentes</h3>
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
           <th><a>SITUAÇÃO</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <tr>
            <td>{!! $l->codigo !!}</td>
            <td>{!! $l->lote_id !!}</td>
            <td>{!! $l->fornecedor_id!!}</td>
            <td>{!! $l->num_pedido !!}</td>
            @if($l->flg_concluida === 0)
              <td><span class="label label-danger">pendente</span></td>
            @else
              <td><span class="label label-success">concluída</span></td>
            @endif 


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

