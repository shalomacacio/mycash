
<div class="form-group col-xs-4">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido',  isset($compra->num_pedido)?$compra->num_pedido:null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', $lotes , $compra->lote OR null,   ['class'=>'form-control', 'placeholder' => 'Selecione...' ] ) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('fornecedor_id','Fornecedor') !!}
	{!! Form::select('fornecedor_id', $fornecedores,  $compra->fornecedor OR null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>


<div class="form-group col-xs-4">
	{!! Form::label('produto_id','Produto') !!}
	{!! Form::select('produto_id', $produtos, null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('preco_compra','Preço Custo') !!}
	<div class="input-group">
		<div class="input-group-btn">
			<a href="#" class="btn btn-info" role="button"><i class="fa fa-calculator"></i></a>
		</div>
	{!! Form::text('preco_compra', null,   ['class'=>'form-control' ] ) !!}
	</div>
</div>

<div class="form-group col-xs-2">
	{!! Form::label('qtd','Qtd') !!}
	{!! Form::number('qtd', null , ['class'=>'form-control',  'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('subtotal','Subtotal') !!}
	{!! Form::text('subtotal', null , ['class'=>'form-control', 'readonly', 'placeholder' => 'SUBTOTAL' ]) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::button('Adicionar', ['class'=>'btn btn-especial btn-success form-control', 'id'=>'btn_add']) !!}
</div>

{!! Form::hidden('codigo', isset($compra->codigo)? $compra->codigo : null, ['id'=>'codigo'] ) !!}