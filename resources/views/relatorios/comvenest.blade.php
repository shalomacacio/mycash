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
                    <th><a>CODIGO</a></th>
                    <th><a>PRODUTO</a></th>
                    <th><a>COMPRA</a></th>
                    <th><a>VENDA</a></th>
                    <th><a>ESTOQUE</a></th>
                    <th><a>AÇÕES</a></th>
                  </tr>
                </thead>
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
      //console.log(itens);
      $('#compras-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('relatorios.anyData') }}',
          columns: [
            {data: 'codigo_interno', name: 'codigo_interno'},
            {data: 'nome', name: 'nome'},
            {data: 'compra', name: 'compra'},
            {data: 'venda', name: 'venda'},
            {data: 'estoque', name: 'estoque'},
            {data: 'action', name: 'action', orderable: false, searchable: false}            
          ]
      });
  });

</script>

@endpush

