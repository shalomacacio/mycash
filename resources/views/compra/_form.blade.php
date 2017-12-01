 {!! Form::open(['url'=>[route('compra.update', $compra->id)], 'method'=>'put']) !!}

<div class="form-group col-xs-3">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido',  isset($compra->num_pedido)?$compra->num_pedido:null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', $lotes , isset($compra->lote_id)?$compra->lote_id : null ,   ['class'=>'form-control', 'required', 'placeholder' => 'Selecione...' ] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('fornecedor_id','Fornecedor') !!}
	{!! Form::select('fornecedor_id', $fornecedores,   isset($compra->fornecedor_id)?$compra->fornecedor_id : null,   ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::submit('Salvar Compra', ['class'=>'btn btn-especial btn-primary form-control', 'id'=>'btn_add']) !!}
</div>


{!! Form::hidden('codigo', $compra->codigo ) !!}

{!! Form::close() !!}