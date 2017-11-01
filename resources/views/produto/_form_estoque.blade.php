

{!! Form::open(['url'=>[route('produto.addEstoque')], 'id'=>'form-marca' ,'method'=>'post']) !!}

	<div class="form-group col-xs-12">
		{!! Form::label('descricao','Marca') !!}

		<div class="input-group">
	                <div class="input-group-btn">
	                   <a href="#" class="btn btn-info" role="button"><i class="fa fa-barcode"></i></a>
	                </div>
		{!! Form::text('descricao', null , ['class'=>'form-control', 'required', 'placeholder' => 'MARCA' ]) !!}
		</div>
	</div>

	<div class="form-group col-xs-12">
		<div class="pull-right">
			{!! Form::submit('Criar', ['class'=>'btn btn-primary', 'id'=>'btn_addMarca']) !!}
			{!! Form::submit('Close', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
		</div>
	</div>

{!! Form::close() !!}