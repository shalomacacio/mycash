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
        <h3 class="box-title"> Lote </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
          {!! Form::open(['url'=>[route('compra.addItem')], 'method'=>'post']) !!}
            @include('compra._form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection

@push('scripts')
@endpush



