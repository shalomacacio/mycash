@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')

<!--BOTÃO NOVO --> 
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12 pull-left ">
    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target=".modal_form"><i class="fa fa-plus"></i> Novo</button>
  </br>
</div>
</div>


<!--MODAL FORM --> 
<div class="modal fade modal_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
   <div class="row">
    <!-- left column -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Produto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="row">
          {!! Form::open(['url'=>[route('produto.store')], 'method'=>'post']) !!}
            @include('produto._form')
            <div class="form-group col-xs-12">
              <div class="pull-right">
                {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
                {!! Form::button('Close', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
              </div>
            </div>
          {!! Form::close() !!}
          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
</div>
<!--FIM MODAL FORM-->

@endsection

@push('scripts')


@endpush



