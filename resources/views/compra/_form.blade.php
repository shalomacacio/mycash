<div class="form-group col-xs-3">
	{!! Form::label('codigo','Compra') !!}
	{!! Form::text('codigo',isset($compra->codigo)? $compra->codigo : null , ['class'=>'form-control', 'placeholder' => 'CODIGO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::text('lote_id', null , ['class'=>'form-control', 'required', 'placeholder' => 'LOTE' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('fornecedor_id','Lote') !!}
	{!! Form::text('fornecedor_id', null , ['class'=>'form-control', 'required', 'placeholder' => 'FORNECEDOR' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido', null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		{!! Form::button('Cancelar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
	</div>
</div>
