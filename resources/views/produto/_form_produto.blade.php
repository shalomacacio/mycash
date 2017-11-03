

<div class="form-group col-xs-4">
	{!! Form::label('codigo_interno','Código') !!}
	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-barcode"></i></a>
                </div>
	{!! Form::text('codigo_interno',isset($produto->codigo_interno)? $produto->codigo_interno : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓDIGO DO PRODUTO' ]) !!}
	</div>
</div>

<div class="form-group col-xs-4">
	{!! Form::label('nome','Nome') !!}
	{!! Form::text('nome',isset($produto->nome)? $produto->nome : null , ['class'=>'form-control', 'required', 'placeholder' => 'NOME' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('descricao','Descrição') !!}
	{!! Form::text('descricao',isset($produto->descricao)? $produto->descricao : null , ['class'=>'form-control', 'required', 'placeholder' => 'DESCRICAO' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('marca_id','Marca') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"  data-toggle="modal" data-target="#modal-marca" ><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::select('marca_id',isset($produto->marca)?$produto->marca->pluck('descricao', 'id'): $marcas ,  isset($produto->marca_id)? $produto->marca_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'MARCA' ]) !!}
	</div>
</div>

<div class="form-group col-xs-4">
	{!! Form::label('categoria_id','Categoria') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button" data-toggle="modal" data-target="#modal-categoria"><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::select('categoria_id',isset($produto->categoria)?$produto->categoria->pluck('descricao', 'id'): $categorias,  isset($produto->categoria_id)? $produto->categoria_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'CATEGORIA' ]) !!}
	</div>
</div>


<div class="form-group col-xs-4">
	{!! Form::label('preco_venda','Preço Venda') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-calculator"></i></a>
                </div>
	{!! Form::text('preco_venda',isset($produto->preco_venda)? $produto->preco_venda : null , ['class'=>'form-control', 'required', 'placeholder' => 'PREÇO DE VENDA ' ]) !!}
	</div>
</div>

<div class="form-group col-xs-4">
	{!! Form::label('fornecedores[]','Fornecedores') !!}
	{!! Form::select('fornecedores[]', isset($produto->fornecedores)?$produto->fornecedores->pluck('descricao', 'id'): $fornecedores , isset($fornecedores->fornecedores)? $fornecedores->fornecedores : null,  ['class'=>'form-control' ,'multiple'=> 'multiple', 'placeholder' => 'Selecione...'] ) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		{!! Form::button('Cancelar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
	</div>
</div>

