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
            <td>{!! $l->codigo_venda !!}</td>
            <td>{!! $l->cliente_id !!}</td>
            <td>{!! $l->tipo_pagamento !!}</td>
            <td>{!! $l->total_geral !!}</td>
            <td>{!! $l->user->name !!}</td>
            <td><a href="{{route('venda.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

