	@if(Session::has('flash_warning'))
	<div class ="row" id="success-alert" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
		<div class="col-md-3 col-sm-6 col-xs-6 pull-left">
			<div class="alert alert-warning alert-dismissible ">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa fa-warning"></i> Atenção!</h4>
				<ul>
					<b>{{Session::get('flash_warning')}}</b>
				</ul>
			</div>
		</div>
	</div>

	@elseif(Session::has('flash_success'))
	<div  id="success-alert" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
		<div class="col-md-3 col-sm-6 col-xs-6 pull-left">
			<div class="alert alert-success alert-dismissible ">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="fa fa-check"></i> Sucesso!</h4>
				<ul>
					<b>{{Session::get('flash_success')}}</b>
				</ul>
			</div>
		</div>
	</div>

	@elseif(Session::has('flash_danger'))
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-6 pull-left">
			<div class="alert alert-danger alert-dismissible ">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Erro!</h4>
				<ul>
					<b>{{Session::get('flash_danger')}}</b>
				</ul>
			</div>
		</div>
	</div>
	@endif



@push('scripts')
<script>
  $(function() {
     $("#success-alert").fadeToggle(3000);
  });
</script>
@endpush

