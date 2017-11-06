@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')


  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> Lote </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
          {!! Form::open(['url'=>[route('compra.store')], 'method'=>'post']) !!}
            @include('compra._form')
            @include('compra._list_itens')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

$(document).ready(function() {
    $('#btn_add').on('click', function (e) {
        e.preventDefault();
  
        var codigo = $('#codigo').val();
        var lote_id = $('#lote_id').val();
        var fornecedor_id = $('#fornecedor_id').val();
        var num_pedido = $('#num_pedido').val();
        var produto_id = $('#produto_id').val();
        var preco_compra = $('#preco_compra').val();
        var qtd = $('#qtd').val();
        var subtotal = $('#subtotal').val();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            url: '/compra/addItem',
            data: {codigo: codigo, lote_id: lote_id, fornecedor_id: fornecedor_id, num_pedido: num_pedido, produto_id: produto_id, preco_compra: preco_compra, qtd: qtd , subtotal: subtotal},
            dataType: 'JSON',
              success: function( response ) {
                console.log(response);
                $('#itens-table').append('<tr><td>'+ response+'</td><td>more data</td></tr>');


              }
        });
    });
});


</script>

@endpush



