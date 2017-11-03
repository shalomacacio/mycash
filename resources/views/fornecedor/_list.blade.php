<div class="box">
  <div class="box-header">
    <h3 class="box-title">Fornecedores</h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>FORNECEDOR</a></th>
          <th><a>SITE</a></th>
          <th><a>AÇÃO</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista as $l)
            <td>{!! $l->descricao !!}</td>
            <td>{!! $l->site !!}</td>
            <td>
              <a href="{{route('fornecedor.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>

    {{ $lista->links() }}

  </div>
</div>
</div>

