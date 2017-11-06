 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">LOJA:</li>
    </ul>
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img  src="{{ asset('dist/img/logo-160x160.jpg') }}"  class="img-circle" alt="User Image">
      </div>

      <div class="pull-left info">
        <p>BEIBYS </p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Status {{ session('status') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header"></li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="/mycash/welcome"><i class="fa fa-dashboard"></i> Principal </a></li>

      <li class="treeview">
      <a href="#"><i class="fa fa-home"></i> <span>Cadastro</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('fornecedor.index')}}"><i class="fa fa-truck"></i> Fornecedor </a></li>
          <li><a href="{{route('produto.index')}}"><i class="fa fa-barcode"></i> Produto </a></li>
       </ul>
     </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-money"></i> <span>Movimentação</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{route('compra.index')}}"><i class="fa fa-shopping-basket"></i> Compras</a></li>
      <li><a href="#"><i class="fa fa-cart-plus"></i> Vendas</a></li>
      <li><a href="#"><i class="fa fa-cart-plus"></i> Pdv</a></li>
    </ul>
  </li>

    <li class="treeview">
    <a href="#"><i class="fa fa-print"></i> <span>Relatórios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-certificate"></i> Produtos Estoque</a></li>
      <li><a href="#"><i class="fa fa-certificate"></i> Vendas </a></li>
    </ul>
  </li>

</ul>
<!-- /.sidebar-menu -->

<ul class="sidebar-menu">
  <li class="header">SUPORTE:</li>
</ul>
</section>
<!-- /.sidebar -->
</aside>