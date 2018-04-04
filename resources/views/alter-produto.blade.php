<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Editar Produto</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> 
  <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" /> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{URL::asset('js/ajax.js')}}"></script>
  <script src="{{URL::asset('js/lightbox.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
  <script src="{{URL::asset('js/cep.js')}}"></script>

    </head>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="">
                            </span>
                            <span class="username"></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
            
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Sair</a>
              </li>
            
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">
         <ul class="sidebar-menu">
          <li >
            <a class="" href="{{route('home.index')}}">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
          </li>
           
        </ul>
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <div id="line-one">
            <div class="container">
               
               <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="icon_house_alt"></i> Editar Produto</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-shopping-cart"></i><a href="{{route('produto.index')}}">Produto</a></li>
                                <li class="active">Editar</li>
                            </ol>
                     </div>
                </div>
                <div class="row">  
                   
                    <form method="post" 
                          action="{{route('produto.update', $produto->id)}}" 
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                       
                     <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Nome</label>
                                <input type="text" name="nome_produto" id="nome_produto" value="{{$produto->nome or old('nome')}}"  
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Data</label>
                                <input type="date" name="dt_entrada" value="{{$produto->dt_entrada or old('dt_entrada')}}"
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Valor</label>
                                <input type="number" name="valor" value="{{$produto->valor_compra or old('valor_compra')}}"
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Descrição</label>
                                <textarea required rows="2" class="form-control" cols="75" name="descricao"> {{$produto->descricao or old('descricao')}}</textarea>
                            </div>    
                        </div>
                        
                        
                        
                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Alterar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    


</body>

</html>
