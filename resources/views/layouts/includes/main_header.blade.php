<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Logo -->
                {{--<a href="{{URL::to('/home')}}" class="navbar-brand btnLoader">
                    <b>CU</b><i>SISTEM</i>
                </a>--}}
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Navbar Left Menu -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a class="btnLoader" href="{{URL::to('/venta/ventas')}}" ><span class="glyphicon glyphicon-shopping-cart" style="color: #FD7B1D"></span> Ventas</a></li>
                    <li><a class="btnLoader" href="{{URL::to('/facturas')}}" ><span class="fa fa-file-invoice-dollar" style="color: #ad1457"></span> Facturas</a></li>
                    <li><a class="btnLoader" href="#"><span class="glyphicon glyphicon-barcode" style="color: #00C853"></span> Inventario</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench" style="color: #D50000"></span> Mantenimiento <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="btnLoader" href="{{URL::to('/clientes')}}"><i class="fa fa-users"></i> Clientes</a>
                            </li>
                            <li>
                                <a class="btnLoader" href="{{URL::to('/usuarios')}}"><i class="fa fa-user-circle"></i> Usuarios</a>
                            </li>
                            <li>
                                <a class="btnLoader" href="{{URL::to('/productos')}}"><i class="fa fa-archive"></i> Productos</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="btnLoader" href="javascript:void(0)"><i class="fa fa-cog"></i> Configuración</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <img src="{{asset('adminLTE-2.4.3/dist/img/avatar0.png')}}" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            <span class="glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('adminLTE-2.4.3/dist/img/avatar0.png')}}" class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->name !!}
                                    <small>Usuario: {!! Auth::user()->username !!}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                {{--<div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>--}}
                                <div class="pull-right">
                                    <button href="{!! url('/logout') !!}" type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Salir
                                    </button>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>