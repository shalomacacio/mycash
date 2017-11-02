

{!! Form::open(['url'=>[route('produto.addEstoque' , $produto->id)], 'id'=>'form-marca' ,'method'=>'put']) !!}

	<div class="form-group col-xs-12 col-md-4">
		{!! Form::label('codigo_interno','Código') !!}
		{!! Form::text('codigo_interno', $produto->codigo_interno , ['class'=>'form-control', 'disabled' ]) !!}
	</div>

	<div class="form-group col-xs-12 col-md-4">
		{!! Form::label('nome','Produto') !!}
		{!! Form::text('nome', $produto->nome , ['class'=>'form-control', 'disabled' ]) !!}
	</div>

	<div class="form-group col-xs-12 col-md-2">
		{!! Form::label('qtd','Quantidade') !!}
		{!! Form::text('qtd', null , ['class'=>'form-control', 'required', 'placeholder' => 'QTD' ]) !!}
	</div>

	<div class="form-group col-xs-12 col-md-2">
		{!! Form::label('estoque','Estq Atual') !!}
		{!! Form::text('estoque', $produto->estoque , ['class'=>'form-control', 'disabled' ]) !!}
	</div>

	<div class="form-group col-xs-12">
		<div class="pull-right">
			{!! Form::submit('Criar', ['class'=>'btn btn-primary','id'=>'btn_addMarca'])    !!}
			{!! Form::button('Close', ['class'=>'btn btn-defaut' ,'data-dismiss'=>'modal']) !!}
		</div>
	</div>
{!! Form::close() !!}

