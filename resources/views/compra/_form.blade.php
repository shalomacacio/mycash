<div class="form-group col-xs-6">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', isset($compra->lote)?$compra->lote->pluck('descricao', 'id':$lotes,isset($compra->lote_id)? $compra->lote_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'LOTE' ]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('fornecedor_id','Lote') !!}
	{!! Form::select('fornecedor_id', isset($compra->fornecedor)?$compra->fornecedor_id->pluck('descricao', 'id':$fornecedores,isset($compra->fornecedor_id)? $compra->fornecedor_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'FORNECEDOR' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido',isset($compra->num_pedido)? $compra->num_pedido : null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		{!! Form::button('Cancelar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
	</div>
</div>
