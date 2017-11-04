<div class="form-group col-xs-3">
	{!! Form::label('codigo','Compra') !!}
	{!! Form::text('codigo',isset($compra->codigo)? $compra->codigo : null , ['class'=>'form-control', 'readonly' ,'placeholder' => 'CODIGO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', $lotes, null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('fornecedor_id','Fornecedor') !!}
	{!! Form::select('fornecedor_id', $fornecedores, null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido', null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('produto_id','Produto') !!}
	{!! Form::select('produto_id', $produtos, null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('preco_compra','Preco') !!}
	{!! Form::text('preco_compra', null,   ['class'=>'form-control' ] ) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('qtd','Qtd') !!}
	{!! Form::text('qtd', null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-2">
	{!! Form::label('subtotal','Subtotal') !!}
	{!! Form::text('subtotal', null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		{!! Form::button('Cancelar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
	</div>
</div>
