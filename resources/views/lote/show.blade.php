@extends('layouts.admin')

@section('content')
 <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lote detalhado
      </h1>

    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-cart-arrow-down"></i> LOTE : {!! $lote->cod_rastreio OR null!!}
            <small class="pull-right">Data: {{Carbon\Carbon::now()->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Quantidade de Itens:</b> {{$lote->sum('qtd')}} <br>
          <b>Valor Total: R$ </b> {{$lote->sum('subtotal')}} <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cod Produto</th>
              <th>Fornecedor</th>
              <th>Produto</th>
              <th>Preço</th>
              <th>Qtd</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
           @foreach($lote as $p)
              <tr>
                <td>{!! $p->codigo_interno !!}</td>
                <td>{!! $p->descricao !!}</td>
                <td>{!! $p->nome !!}</td>
                <td>{!! $p->preco_compra !!}</td>
                <td>{!! $p->qtd !!}</td>
                <td>{!! $p->subtotal !!}</td>
              </tr>
            @endforeach()
            </tbody>
            <tfooter>
              <tr>
                <td colspan="5"><h2>Total</h2></td> 
                <td><h2> {{  'R$ '.number_format($lote->sum('subtotal'), 2, ',', '.') }} </h2></td>
              </tr>
            </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection


 