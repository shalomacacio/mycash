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
        <h3 class="box-title"> PEDIDO : {{isset($venda->codigo_venda)? $venda->codigo_venda : null }}</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      {!! Form::open(['url'=>[route('venda.addItem')], 'method'=>'post']) !!}
      <div class="box-body">
        <div class="row">
            @include('venda._form_add_itens')
        </div>
      </div>
       {!! Form::close() !!}
    </div>
    @include('venda._list_itens')
    <!-- /.box -->
  </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

      $(".select2").select2({
          "language": "pt-BR",
      });

      $('input[name=qtd]').blur(function() {

        //var $vlrVenda = $("#vlr_venda").val();
        var qtd = parseInt($('input[name=qtd]').val());
        var preco_compra = parseFloat ($('input[name=preco_venda]').val());
        var subtotal = qtd * preco_compra;       
        parseFloat ($('input[name=subtotal]').val(subtotal.toFixed(2)));

           $('input[name=desconto]').blur(function() {
            var desconto = parseInt($('input[name=desconto]').val());
            var totalComDesconto = subtotal - desconto;      
            parseFloat ($('input[name=subtotal]').val(totalComDesconto.toFixed(2)));
           });

       });

      /**$('select[id=produto_id]').change(function() {

        var precoProduto = $(this).val();
        $('#preco_venda').val(precoProduto);
        $('#qtd').val('0');
        $('#desconto').val('0');
      });*/

    //atualiza o preço VIA AJAX
    $('select[id=produto_id]').change(function() {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "GET",
            data: {produto_id: $("#produto_id").val()},
            url: "/venda/ajaxprod",
            datatype: "json",
            success: function(preco) {
              //console.log(preco);
              //alert(preco);
              $('#preco_venda').val(preco);
              $('#qtd').val('0');
              $('#desconto').val('0');
            }

        });
    });

</script>

@endpush

