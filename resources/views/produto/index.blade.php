
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

<script type="text/javascript">

  $(function() {
      //console.log(itens);
      $('#produtos-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('produto.anyData') }}',
          columns: [
            {data: 'codigo_interno', name: 'codigo_interno'},
            {data: 'nome', name: 'nome'},
            {data: 'marca', name: 'marca'},
            {data: 'categoria', name: 'categoria'},
            {data: 'preco_venda', name: 'preco_venda'},
            {data: 'estoque', name: 'estoque'},
            {data: 'action', name: 'action', orderable: false, searchable: false}            
          ],            
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
			    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
			    "sInfoPostFix": "",
			    "sInfoThousands": ".",
			    "sLengthMenu": "_MENU_ ítens por página",
			    "sLoadingRecords": "Carregando...",
			    "sProcessing": "Processando...",
			    "sZeroRecords": "Nenhum registro encontrado",
			    "sSearch": "Pesquisar",
			    "oPaginate": {
			        "sNext": "Próximo",
			        "sPrevious": "Anterior",
			        "sFirst": "Primeiro",
			        "sLast": "Último"
			    },
			    "oAria": {
			        "sSortAscending": ": Ordenar colunas de forma ascendente",
			        "sSortDescending": ": Ordenar colunas de forma descendente"
			    }
            }
      });
  });

</script>

@endpush




