

{!! Form::open(['url'=>[route('produto.addPreco' , $produto->id)], 'id'=>'form-marca' ,'method'=>'put']) !!}

	<div class="form-group col-xs-12 col-md-3">
		{!! Form::label('codigo_interno','Código') !!}
		{!! Form::text('codigo_interno', $produto->codigo_interno , ['class'=>'form-control', 'disabled' ]) !!}
	</div>

	<div class="form-group col-xs-12 col-md-3">
		{!! Form::label('nome','Produto') !!}
		{!! Form::text('nome', $produto->nome , ['class'=>'form-control', 'disabled' ]) !!}
	</div>

	<div class="form-group col-xs-3">
		{!! Form::label('preco_custo','Preço Custo') !!}

		<div class="input-group">
	                <div class="input-group-btn">
	                   <a href="#" class="btn btn-info" role="button" data-toggle="modal" data-target="#modal-calc"><i class="fa fa-calculator"></i></a>
	                </div>
		{!! Form::text('preco_custo',isset($produto->preco_custo)? $produto->preco_custo : null , ['class'=>'form-control', 'required', 'placeholder' => 'PREÇO DE CUSTO ' ]) !!}
		</div>
	</div>

	<div class="form-group col-xs-12 col-md-3">
		{!! Form::label('preco_venda','Preço Venda') !!}
		{!! Form::text('preco_venda',isset($produto->preco_venda)? $produto->preco_venda : null , ['class'=>'form-control', 'required', 'placeholder' => 'PREÇO DE VENDA ' ]) !!}
	</div>

	<div class="form-group col-xs-12">
		<div class="pull-right">
			{!! Form::submit('Atualizar', ['class'=>'btn btn-primary','id'=>'btn_addMarca'])    !!}
			{!! Form::button('Close', ['class'=>'btn btn-defaut' ,'data-dismiss'=>'modal']) !!}
		</div>
	</div>
{!! Form::close() !!}

