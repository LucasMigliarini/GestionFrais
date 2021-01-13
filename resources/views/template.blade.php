<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GestionFrais</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.blade.php">GestionFrais</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-right navbar-top-links">


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <form role="form" action="/logout" method="POST">
                        @csrf
                        <i class="fa fa-sign-out fa-fw"></i><button type="submit" class="">
                            deconexion
                        </button>
                    </form>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="/home" class="active"><i class="fa fa-dashboard fa-fw"></i> Acceuil</a>
                    </li>
                    @if(Auth::User()->roles->Rpermissions == 3)
                        <li>
                            <a href="/showfichevisitor/{{Auth::user()->id}}"><i class="fa fa-align-justify  fa-fw"></i> Afficher fiches</a>
                        </li>
                    @endif
                    @if(Auth::User()->roles->Rpermissions == 3)
                        <li>
                            <a href="/shownewfiche"><i class="fa fa-edit fa-fw"></i> Nouvelle Fiche</a>
                        </li>
                    @endif
                    @if(Auth::User()->roles->Rpermissions == 2)
                        <li>
                            <a href="/showfiche"><i class="fa fa-align-justify fa-fw"></i> Afficher fiches</a>
                        </li>
                    @endif
                    @if(Auth::User()->roles->Rpermissions == 1)
                        <li>
                            <a href="/showusers"><i class="fa fa-align-justify  fa-fw"></i> Gestion utilisateur</a>
                        </li>
                    @endif
                    @if(Auth::User()->roles->Rpermissions == 1)
                        <li>
                            <a href="/register"><i class="fa fa-edit fa-fw"></i> Créer utilisateur</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
@yield('composer')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>





<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>
@yield('js')
</body>
</html>



