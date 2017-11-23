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
          <th><a>PREÇO</a></th>
          <th><a>ESTOQUE</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
         @if($l->estoque === 0)
          <tr style="color:red" >
        @elseif($l->estoque>0 AND $l->estoque <= $l->estoque_min)
          <tr style="color:orange" >
        @else
          <tr>
        @endif
            <td>{!! $l->codigo_interno !!}</td>
            <td>{!! $l->nome !!}</td>
            <td>{!! $l->marca->descricao!!}</td>
            <td>{!! $l->categoria->descricao !!}</td>
            <td>{!! $l->preco_venda !!}</td>
            <td>{!! $l->estoque !!}</td>
            <td>
              <a href="{{route('produto.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
              <a href="{{route('produto.estoque', $l->id)}}"  class="btn btn-xs btn-danger"><i class="fa fa-retweet"></i></a>
              <a href="{{route('produto.atualizaPreco', $l->id)}}"  class="btn btn-xs btn-success"><i class="fa fa-money"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

