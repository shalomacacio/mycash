@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')


  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->


      <div class="box-body">
        <div class="row">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">COMPRAS / VENDAS / ESTOQUE </h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="compras-table">
                  <thead>
                   <tr>
                    <th><a>PRODUTO</a></th>
                    <th><a>QTD COMPRA</a></th>
                    <th><a>QTD VENDA</a></th>
                    <th><a>ESTOQUE </a></th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($produtos as $p)
                      <tr>
                      <td>{!! $p->codigo_interno!!} - {!! $p->nome!!} </td>
                      <td><center>{!! $p->compra!!}</center></td>
                      <td><center>{!! $p->venda!!}</center></td>
                      <td><center>{!! $p->estoque !!}</center></td>
                    </tr>
                  @endforeach()
                </tbody>
              </table>
            </div>
          </div>
          </div>



        </div>
        <br>
      </div>



    <!-- /.box -->
  </div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">

  $(function() {
      $('#compras-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('relatorios.comvenest') !!}',
          columns: [
              { data: 'id', name: 'id' },

          ]
      });
  });

</script>

@endpush

