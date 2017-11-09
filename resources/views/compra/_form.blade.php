<div class="form-group col-xs-3">
	{!! Form::label('codigo','Compra') !!}
	{!! Form::text('codigo',isset($compra->codigo)? $compra->codigo : null , ['class'=>'form-control', 'readonly' ,'placeholder' => 'CODIGO' ]) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('lote_id','Lote') !!}
	{!! Form::select('lote_id', $lotes , $compra->lote OR null,   ['class'=>'form-control', @if($compra->lote) 'readOnly'  @endif 'placeholder' => 'Selecione...' ] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('fornecedor_id','Fornecedor') !!}
	{!! Form::select('fornecedor_id', $fornecedores,  $compra->fornecedor OR null,   ['class'=>'form-control' , 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-3">
	{!! Form::label('num_pedido','Pedido') !!}
	{!! Form::text('num_pedido',  isset($compra->num_pedido)?$compra->num_pedido:null , ['class'=>'form-control', 'required', 'placeholder' => 'PEDIDO' ]) !!}
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
	{!! Form::text('subtotal', null , ['class'=>'form-control', 'required','readonly', 'placeholder' => 'SUBTOTAL' ]) !!}
</div>

<div class="form-group col-xs-2">
	<br>
	{!! Form::button('+', ['class'=>'btn btn-primary', 'id'=>'btn_add']) !!}
</div>
