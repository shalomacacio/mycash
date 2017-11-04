<div class="box">
  <div class="box-header">
    <h3 class="box-title">Compras</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>CODIGO</a></th>
          <th><a>LOTE</a></th>
          <th><a>FORNECEDOR</a></th>
          <th><a>NUM PEDIDO</a></th>
          <th><a>TOTAL</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <td>{!! $l->codigo !!}</td>
            <td>{!! $l->lote->descricao !!}</td>
            <td>{!! $l->fornecedor !!}</td>
            <td>{!! $l->taxas !!}</td>
            <td>{!! $l->total !!}</td>
            <td>
              <a href="{{route('compra.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

