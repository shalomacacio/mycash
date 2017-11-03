<div class="form-group col-xs-6">
	{!! Form::label('cod_rastreio','Rastreio') !!}
	{!! Form::text('cod_rastreio',isset($lote->cod_rastreio)? $lote->cod_rastreio : null , ['class'=>'form-control', 'required', 'placeholder' => 'CÓD RASTREIO' ]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('descricao','Descrição') !!}
	{!! Form::text('descricao',isset($lote->descricao)? $lote->descricao : null , ['class'=>'form-control', 'placeholder' => 'DESCRIÇÃO' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('num_itens','QTD Itens') !!}
	{!! Form::number('num_itens',isset($lote->num_itens)? $lote->num_itens : null , ['class'=>'form-control', 'placeholder' => 'QTD ITENS' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('taxas','Taxas (Iof + Frete + Outros)') !!}
	{!! Form::text('taxas',isset($lote->taxas)? $lote->taxas : null , ['class'=>'form-control', 'placeholder' => 'IOF + FRETE + OUTROS' ]) !!}
</div>

<div class="form-group col-xs-4">
	{!! Form::label('total','VALOR TOTAL') !!}
	{!! Form::text('total',isset($lote->total)? $lote->total : null , ['class'=>'form-control', 'placeholder' => 'TOTAL' ]) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		{!! Form::button('Cancelar', ['class'=>'btn btn-defaut', 'data-dismiss'=>'modal']) !!}
	</div>
</div>
