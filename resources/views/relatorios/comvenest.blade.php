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

      <div class="box-body">
        <div class="row">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">COMPRAS / VENDAS / ESTOQUE </h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="compras-table">
                  <thead>
                   <tr>
                    <th><a>PRODUTO</a></th>
                    <th><a>QTD COMPRA</a></th>
                    <th><a>QTD COMPRA</a></th>
                    <th><a>ESTOQUE </a></th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($produtos as $p)
                      <tr>
                      <td>{!! $p->codigo_interno!!} - {!! $p->nome!!} </td>
                      <td></td>
                      <td></td>
                      <td>{!! $p->estoque !!}</td>
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

