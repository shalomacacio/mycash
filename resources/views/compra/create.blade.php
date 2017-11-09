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
        <h3 class="box-title"> Compra </h3>
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
                  $('#itens-table').append('<tr>'+
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
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        var codigo = $('#codigo').val();
        var produto_id = document.getElementById("proid"+button_id).firstChild.nodeValue;
        //var produto = document.getElementById("nom"+currentId);
        //codigo.firstChild.nodeValue
        //alert(produto_id);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
           type: "POST",
           url: '/compra/delItem/',
           data:{produto_id: produto_id, codigo: codigo }, 
           dataType: 'JSON', 
           success: function(itens2){
            //console.log(itens2);
            $('#itens-table').empty();
                  $.each(itens2, function(key, data){
                  $('#itens-table').append(
                    '<tbody>'+
                    '<td id=proid'+ key+' visible="false">'+ data.produto_id +'</td>'+
                    '<td id=nom'+ key+'>'+ data.nome +'</td>'+
                    '<td id=pre'+ key+'>'+data.preco_compra+'</td>'+
                    '<td id=qtd'+ key+'>'+data.qtd+'</td>'+
                    '<td id=sub'+ key+'>'+data.subtotal+'</td>'+
                    '<td><a  type="button" class="btn btn-danger btn_remove"  id="'+key +'"><i class="fa fa-trash"></i></a></td>'+
                    '</tbody>'); 
                  });
           }
        });
        
    });

</script>

@endpush

