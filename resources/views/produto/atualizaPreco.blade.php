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
              {!! Form::label('compra_id','Pedido') !!}
              {!! Form::select('compra_id',$compras,   ['class'=>'form-control', 'placeholder' => 'Selecione...' ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-12">
              {!! Form::label('vlr_compra','Codigo da Compra teste') !!}
              {!! Form::text('vlr_compra', isset($compra->codigo)? $compra->codigo : null , ['class'=>'form-control', 'disabled' ]) !!}
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
  
   $('#compra_id').on('blur', function (e) {
        e.preventDefault();
  
        var compra_id = $('#compra_id').val();

        //alert(compra_id);
        

        $.ajax({

            type: "GET",
            url: '/produto/'+ compra_id +'/searchCompra',
            dataType: 'JSON',
            success: function( lote ) {
                console.log(lote);
            }
            
        });

    });




</script>

@endpush



