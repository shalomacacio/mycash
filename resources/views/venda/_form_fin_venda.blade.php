

<div class="form-group col-xs-12 col-md-4">
	{!! Form::label('cliente','Cliente') !!}
	{!! Form::text('cliente', null , ['class'=>'form-control' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('tipo_pagamento','Tipo de Pagamento') !!}
	{!! Form::select('tipo_pagamento', array('V' => 'A VISTA ', 'C' => 'CREDITO', 'D' => 'DEBITO'), null,   ['class'=>'form-control select2' , 'data-placeholder' => 'Selecione...'] ) !!}
	
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('num_parcelas','N Parcelas') !!}
	{!! Form::text('num_parcelas', null , ['class'=>'form-control' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('desconto','Desconto') !!}
	{!! Form::text('desconto', null , ['class'=>'form-control' ]) !!}
</div>

<div class="form-group col-xs-12 col-md-2">
	{!! Form::label('total_geral','Total') !!}
	{!! Form::text('total_geral', $venda->produtos()->sum('subtotal') , ['class'=>'form-control', 'readOnly' ]) !!}
</div>

{!! Form::hidden('id', $venda->id ) !!}