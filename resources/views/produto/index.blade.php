
@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')


	<!--BOTÃO NOVO --> 

	<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12 pull-right ">
	    {!! Form::open(['url'=>[route('produto.create')], 'id'=>'form-ajax' ,'method'=>'get']) !!}
	      {!! Form::submit('Novo', ['class'=>'btn btn-block btn-success btn-sm']) !!}
	    {!! Form::close() !!}
	  </div>
	</div>
	<br>
	@include('produto._list')

	


@isset($produto->id)
<!-- MODAL ESTOQUE -->
<div class="modal fade bd-example-modal-sm" id="modal-estoque" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nova Marca</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
           @include('produto._form_estoque')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL ESTOQUE -->
@endisset


@endsection

@push('scripts')


@endpush



