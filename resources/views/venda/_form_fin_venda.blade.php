

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('tipo_pagamento','Tipo de Pagamento') !!}
	{!! Form::select('produto_id', array('AV' => 'A VISTA ', 'CC' => 'CREDITO', 'CD' => 'DEBITO'), null,   ['class'=>'form-control select2' , 'data-placeholder' => 'Selecione...'] ) !!}
	
</div>

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('parcelas','N Parcelas') !!}
	{!! Form::text('parcelas', null , ['class'=>'form-control' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('desconto','Desconto') !!}
	{!! Form::text('desconto', null , ['class'=>'form-control' ]) !!}
</div>


{!! Form::hidden('id', $venda->id ) !!}