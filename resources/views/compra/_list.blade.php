<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lotes</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>COD RASTREIO</a></th>
          <th><a>DESCRIÇÃO</a></th>
          <th><a>NUM ITENS</a></th>
          <th><a>TAXAS</a></th>
          <th><a>TOTAL</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <td>{!! $l->cod_rastreio !!}</td>
            <td>{!! $l->descricao !!}</td>
            <td>{!! $l->num_itens !!}</td>
            <td>{!! $l->taxas !!}</td>
            <td>{!! $l->total !!}</td>
            <td>
              <a href="{{route('lote.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

