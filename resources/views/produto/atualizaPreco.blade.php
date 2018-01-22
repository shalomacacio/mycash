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
        <h3 class="box-title"> Atualizar Preço </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
            @include('produto._form_preco')
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection


<!-- MODAL CALC PRECO -->
<div class="modal fade bd-example-modal-sm" id="modal-calc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">CALCULAR CUSTO</h4>
        <div class="modal-body">
           {!! Form::open() !!}

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::label('vlr_compra','Vlr Compra + IOF' , ['data-toggle'=>'tooltip' ,'title'=>'Valor do Pedido já com IOF']) !!}
              {!! Form::text('vlr_compra', null , ['class'=>'form-control' ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::label('vlr_taxa','Vlr Taxas', ['data-toggle'=>'tooltip' ,'title'=>'Frete + Tributação ']) !!}
              {!! Form::text('vlr_taxa', null , ['class'=>'form-control' ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::label('vlr_unit','Vlr Unitário', ['data-toggle'=>'tooltip' ,'title'=>'Vlr produto que deseja calcular o custo']) !!}
              {!! Form::text('vlr_unit', null , ['class'=>'form-control'  ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::button('Calcular', ['class'=>'btn btn-block btn-success btn-sm', 'id'=>'btn_calc']) !!}
            </div>

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::label('vlr_custo','Preço de Custo') !!}
              {!! Form::text('vlr_custo', null , ['class'=>'form-control', 'disabled' ]) !!}
              
              <label id="percentual">0</label><i class="fa fa-percent"></i>
            </div>

           {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL MARCA -->

@push('scripts')

<script type="text/javascript">
  
   $('#btn_calc').on('click', function (e) {
       // alert(e.preventDefault());
  
      var compra = parseFloat($('#vlr_compra').val());
      var taxas = parseFloat($('#vlr_taxa').val());

      var aumento = (taxas/compra)*100;
      var unit = parseFloat($('#vlr_unit').val());

      var vlr_custo = ((unit * aumento)/100)+unit;

      parseFloat ($('input[name=vlr_custo]').val(vlr_custo.toFixed(2)));
       $("#percentual").html(aumento.toFixed(2));

    });




</script>

@endpush



