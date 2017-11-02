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
        <h3 class="box-title"> Estoque </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
            @include('produto._form_estoque')
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection

@push('scripts')
@endpush



