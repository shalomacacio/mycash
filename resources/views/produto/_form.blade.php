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
	{!! Form::label('marca_id','Marca') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::text('marca_id',isset($produto->marca_id)? $produto->marca_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'MARCA' ]) !!}
	</div>
</div>

<div class="form-group col-xs-4">
	{!! Form::label('categoria_id','Categoria') !!}

	<div class="input-group">
                <div class="input-group-btn">
                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-plus"></i></a>
                </div>
	{!! Form::text('categoria_id',isset($produto->categoria_id)? $produto->categoria_id : null , ['class'=>'form-control', 'required', 'placeholder' => 'CATEGORIA' ]) !!}
	</div>
</div>