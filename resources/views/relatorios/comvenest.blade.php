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
                    <th><a>COMPRA</a></th>
                    <th><a>VENDA</a></th>
                    <th><a>ESTOQUE </a></th>
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
      $('#compras-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('relatorios.anyData') }}',
          columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {email: 'category', name: 'email'},
            {data: 'created_at', name: 'created_at'}

          ]
      });
  });

</script>

@endpush

