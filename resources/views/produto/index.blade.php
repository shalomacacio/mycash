
@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')


	<!--BOTÃO NOVO --> 

	<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12 pull-left ">
	    {!! Form::open(['url'=>[route('produto.create')], 'id'=>'form-ajax' ,'method'=>'get']) !!}
	      {!! Form::submit('Novo', ['class'=>'btn btn-block btn-success btn-sm', 'id'=>'btn_addMarca']) !!}
	    {!! Form::close() !!}
	  </div>
	</div>
	@include('produto._list')

@endsection

@push('scripts')
@endpush



