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
        <h3 class="box-title"> Venda : {{isset($venda->codigo_venda)? $venda->codigo_venda : null }}</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      {!! Form::open(['url'=>[route('venda.update', $venda->id)], 'method'=>'put']) !!}
      <div class="box-body">
        <div class="row">
           @include('venda._form_add_itens')
        </div>
         @include('venda._list_itens')
        <br>
        <div class="form-group col-xs-12">
          <div class="pull-right">
            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
          </div>
        </div>
      </div>

       {!! Form::close() !!}
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">


/*
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
            success: function( itens ) {
                  //limpar tabela 
                  $('#itens-table').empty();
                  $.each(itens, function(key, data){
                  $('#itens-table').append('<tr id=row'+key+'>'+
                                            '<td id=proid'+ key+' visible="false">'+ data.produto_id +'</td>'+
                                            '<td id=nom'+ key+'>'+ data.nome +'</td>'+
                                            '<td id=pre'+ key+'>'+data.preco_compra+'</td>'+
                                            '<td id=qtd'+ key+'>'+data.qtd+'</td>'+
                                            '<td id=sub'+ key+'>'+data.subtotal+'</td>'+
                                            '<td><a  type="button" class="btn btn-danger btn_remove"  id="'+key +'"><i class="fa fa-trash"></i></a></td>'+
                                            '</tr>'); 
                });
            }
            
        });
        limpaCampos();
 
    });*/


      $('input[name=qtd]').blur(function() {

        //var $vlrVenda = $("#vlr_venda").val();
        var qtd = parseInt($('input[name=qtd]').val());
        var preco_compra = parseFloat ($('input[name=preco_compra]').val());
        var subtotal = qtd * preco_compra;       
        parseFloat ($('input[name=subtotal]').val(subtotal.toFixed(2)));
       });

      function limpaCampos(){
        $('input[name=qtd]').val('');
        $('input[name=preco_compra]').val('');
        $('input[name=subtotal]').val('');
         
      }



</script>

@endpush

