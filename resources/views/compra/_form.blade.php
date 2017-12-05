 {!! Form::open(['url'=>[route('compra.update', $compra->id)], 'method'=>'put']) !!}

<div class="form-group col-xs-2">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido',  isset($compra->num_pedido)?$compra->num_pedido:null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', $lotes , isset($compra->lote_id)?$compra->lote_id : null ,   ['class'=>'form-control', 'required', 'placeholder' => 'Selecione...' ] ) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('fornecedor_id','Fornecedor') !!}
	{!! Form::select('fornecedor_id', $fornecedores,   isset($compra->fornecedor_id)?$compra->fornecedor_id : null,   ['class'=>'form-control' ,'required', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('taxa_imposto','Taxa Imposto') !!}
	{!! Form::text('taxa_imposto',  isset($compra->taxa_imposto)?$compra->taxa_imposto:null , ['class'=>'form-control', 'required', 'placeholder' => 'TAXA IMPOSTO' ]) !!}
</div>

<div class="form-group col-xs-1">
	{!! Form::label('flg_concluida','Concluir') !!} <br>
	{{ Form::checkbox('flg_concluida',null, isset($compra->flg_concluida)?$compra->flg_concluida:false) }}
</div>

<div class="form-group col-xs-2">
	{!! Form::submit('Salvar Compra', ['class'=>'btn btn-especial btn-primary form-control', 'id'=>'btn_add']) !!}
</div>


{!! Form::hidden('codigo', $compra->codigo ) !!}
{!! Form::hidden('flg_concluida', 0 ) !!}

{!! Form::close() !!}