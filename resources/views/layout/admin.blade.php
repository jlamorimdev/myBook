<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gerenciador de Livros</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
     <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
     <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">m<b>B</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>myBook</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegação</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="{{URL::action('DashboardController@logout')}}" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Livros</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/livros/livros"><i class="fa fa-circle-o"></i>Meus Livros</a></li>
                <li><a href="/livros/compras"><i class="fa fa-circle-o"></i> Desejos</a></li>
              </ul> 
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Cadastro Básico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/cadastro/editoras"><i class="fa fa-circle-o"></i> Editoras</a></li>
                <li><a href="/cadastro/marcadores"><i class="fa fa-circle-o"></i> Marcadores</a></li>
                <li><a href="/cadastro/tipos"><i class="fa fa-circle-o"></i> Gênero</a></li>
              </ul>
            </li> 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Livros</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!--Conteudo-->
                      @yield('conteudo')
                      <!--Fim Conteudo-->
                    </div>
                  </div>

                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 5.3.0
    </div>
    <strong>Copyright &copy; 2015-2020 <a href="https://www.linkedin.com/in/jo%C3%A3o-lucas-pinto-amorim-74740a167/" target="_blank">JL Amorim</a>.</strong> Todos os direitos reservados.
  </footer>


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/app.min.js')}}"></script>

</body>
</html>
