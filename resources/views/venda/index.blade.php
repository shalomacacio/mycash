
@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')


	<!--BOTÃO NOVO --> 

	<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12 pull-right ">
	    {!! Form::open(['url'=>[route('venda.create')] ,'method'=>'get']) !!}
	      {!! Form::submit('NOVO PEDIDO', ['class'=>'btn btn-block btn-success btn-sm']) !!}
	    {!! Form::close() !!}
	  </div>
	</div>
	<br>
	@include('venda._list')

@endsection





