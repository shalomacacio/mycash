@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')
	@include('layouts._widget')

<!--BOTÃO NOVO --> 
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12 pull-left ">
    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-produto"><i class="fa fa-plus"></i> Novo</button></br>
  </div>
</div>

<!-- MODAL PRODUTO -->
<div class="modal fade bd-example-modal-lg" id="modal-produto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Novo Produto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
           @include('produto._form_produto')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL PRODUTO -->

<!-- MODAL MARCA -->
<div class="modal fade bd-example-modal-sm" id="modal-marca" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nova Marca</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
           @include('produto._form_marca')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL MARCA -->

<!-- MODAL CATEGORIA -->
<div class="modal fade bd-example-modal-sm" id="modal-categoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nova Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
           @include('produto._form_categoria')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL MARCA -->

@endsection

@push('scripts')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn_addMarca").click(function(e){
        e.preventDefault();

        var descricao = $("input[name=descricao]").val();

        $.ajax({
          dataType: 'json',
           type:'POST',
           url:'/produto/addMarca',
           data:{descricao:descricao},
            success: function( data ) {
                $.each(data, function (key, value) {
                  alert(value.descricao);
                });
            
            }

         });
    });


</script>
@endpush



