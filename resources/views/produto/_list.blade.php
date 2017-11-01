<div class="box">
  <div class="box-header">
    <h3 class="box-title">Produtos</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>CÓD</a></th>
          <th><a>NOME</a></th>
          <th><a>MARCA</a></th>
          <th><a>CATEGORIA</a></th>
          <th><a>COMPRA</a></th>
          <th><a>VENDA</a></th>
          <th><a>QTD</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
          <tr>
            <td>{!! $l->codigo !!}</td>
            <td>{!! $l->nome !!}</td>
            <td>{!! $l->marca_id!!}</td>
            <td>{!! $l->categoria_id !!}</td>
            <td>{!! $l->vlr_compra !!}</td>
            <td>{!! $l->preco_venda !!}</td>
            <td>{!! $l->estoque !!}</td>
       
            <td><a href="{{route('produto.edit', $l->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a></td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

