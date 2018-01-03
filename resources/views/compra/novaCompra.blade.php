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
        <h3 class="box-title"> Compra : {{isset($compra->codigo)? $compra->codigo : null }}</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
          @include('compra._form')
          @include('compra._form_add_itens')
        </div>
      </div> 
    </div>
    @include('compra._list_itens')
    <!-- /.box -->
  </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

      $(".select2").select2({
          "language": "pt-BR",
      })

      $('input[name=qtd]').blur(function() {

        //var $vlrVenda = $("#vlr_venda").val();
        var qtd = parseInt($('input[name=qtd]').val());
        var preco_compra = parseFloat ($('input[name=preco_compra]').val());
        var subtotal = qtd * preco_compra;       
        parseFloat ($('input[name=subtotal]').val(subtotal.toFixed(2)));

       });

</script>

@endpush

