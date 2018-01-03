
 {!! Form::open(['url'=>[route('compra.addItem')], 'method'=>'post']) !!}
<div class="form-group col-xs-4">
	{!! Form::label('produto_id','Produto') !!}
		<div class="input-group">
			<div class="input-group-btn">
				<a href="#" class="btn btn-info" role="button" data-toggle="modal" data-target="#modal-produto" ><i class="fa fa-barcode"></i></a>
			</div>
		{!! Form::select('produto_id', $produtos, null,   ['class'=>'form-control select2' , 'data-placeholder' => 'Selecione...'] ) !!}
		</div>
</div>

<div class="form-group col-xs-2">
	{!! Form::label('preco_compra','Preço') !!}
	{!! Form::text('preco_compra', null,   ['class'=>'form-control' ] ) !!}
</div>

<div class="form-group col-xs-1">
	{!! Form::label('qtd','QTD') !!}
	{!! Form::text('qtd', null,   ['class'=>'form-control' ] ) !!}
</div>


<div class="form-group col-xs-2">
	{!! Form::label('subtotal','Subtotal') !!}
	{!! Form::text('subtotal', null,   ['class'=>'form-control' ] ) !!}
</div>


<div class="form-group col-xs-2">
	{!! Form::submit('Adicionar', ['class'=>'btn btn-especial btn-success form-control', 'id'=>'btn_add']) !!}
</div>

{!! Form::hidden('id', $compra->id ) !!}

{!! Form::close() !!}