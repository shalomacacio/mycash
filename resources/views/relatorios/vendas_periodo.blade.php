@extends('layouts.admin')

@section('content')
	@include('errors._error')
	@include('errors._alert')


  <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->



      <div class="box-body">
    <div class="row">

          {!! Form::open(['url'=>[route('relatorios.getVendasPeriodo')] ,'method'=>'GET']) !!}
            <div class="form-group col-xs-12 col-md-3">
              {!! Form::label('inicio','Início') !!}
              {!! Form::date('inicio', null, ['class'=>'form-control' ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-3">
              {!! Form::label('fim','Fim') !!}
              {!! Form::date('fim', null , ['class'=>'form-control' ]) !!}
            </div>

            <div class="form-group col-xs-12 col-md-3">
                {!! Form::submit('Buscar', ['class'=>'btn btn-especial btn-primary']) !!}
            </div>

          {!! Form::close() !!}
    </div>
@isset($vendas)

    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">VENDAS </h3>
        </div>
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="vendas-table">
                  <thead>
                   <tr>
                    <th><a>CODIGO</a></th>
                    <th><a>TIPO PAGAMENTO</a></th>
                    <th><a>TOTAL</a></th>
                    <th><a>AÇÕES</a></th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($vendas as $v)
                      <td>{!! $v->codigo_venda !!}</td>
                      <td>{!! $v->tipo_pagamento !!}</td>
                      <td>{!! $v->total_geral !!}</td>
                    </tr>
                  @endforeach()
                 
                </tbody>
              </table>
            </div>
          </div>
          </div>

 @endisset

        </div>
        <br>
      </div>



    <!-- /.box -->
  </div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">

  $(function() {
      //console.log(itens);
      $('#compras-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('relatorios.anyData') }}',
          columns: [
            {data: 'codigo_interno', name: 'codigo_interno'},
            {data: 'nome', name: 'nome'},
            {data: 'compra', name: 'compra'},
            {data: 'venda', name: 'venda'},
            {data: 'estoque', name: 'estoque'},
            {data: 'action', name: 'action', orderable: false, searchable: false}            
          ]
      });
  });

</script>

@endpush

