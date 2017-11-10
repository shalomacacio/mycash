<div class="form-group col-xs-6">
	{!! Form::label('descricao','Fornecedor') !!}
	{!! Form::text('descricao',isset($fornecedor->descricao)? $fornecedor->descricao : null , ['class'=>'form-control', 'required', 'placeholder' => 'FORNECEDOR' ]) !!}
</div>

<div class="form-group col-xs-6">
	{!! Form::label('site','Site') !!}
	{!! Form::text('site',isset($fornecedor->site)? $fornecedor->site : null , ['class'=>'form-control', 'placeholder' => 'WWW.FORNECEDOR.COM.BR' ]) !!}
</div>

<div class="form-group col-xs-12">
	<div class="pull-right">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		<a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
	</div>
</div>