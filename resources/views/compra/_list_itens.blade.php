

      <table class="table table-bordered table-striped" id="marcas-table">
        <thead>
         <tr>
          <th><a>PRODUTO</a></th>
          <th><a>PREÇO</a></th>
          <th><a>QTD</a></th>
          <th><a>SUBTOTAL</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach($compra->produtos as $l)
            <td>{!! $l!!}</td>
              <a href="{{route('compra.edit', $l->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            </td>
          </tr>
        @endforeach()
      </tbody>
    </table>


