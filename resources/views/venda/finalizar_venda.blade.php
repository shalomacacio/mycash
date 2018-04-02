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
      {!! Form::open(['url'=>[route('venda.concluirVenda', $venda->id)], 'method'=>'PUT']) !!}
      <div class="box-body">
        <div class="row">
            @include('venda._form_fin_venda')
        </div>
        
        <br>
        <div class="form-group col-xs-12">
          <div class="pull-right">
            {!! Form::submit('Finalizar Venda', ['class'=>'btn btn-danger']) !!}
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


  $('input[name=desconto]').blur(function() {

    

    var desconto = parseInt($('input[name=desconto]').val());
    var total = parseInt($('input[name=total_geral]').val());  

    var totalGeral = total - desconto;
   // parseInt($('input[name=total_geral]').val(totalGeral.toFixed(2)));
    parseFloat ($('input[name=total_geral]').val(totalGeral.toFixed(2)));

  });
</script>

@endpush

