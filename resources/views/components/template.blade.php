<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('biblioteca/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('biblioteca/css/stylePainel.css')}}">
    <script src="{{asset('biblioteca/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('biblioteca/js/bootstrap.min.js')}}"></script>
    
    <link rel="stylesheet" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
    <script src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('datepicker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5>Biblioteca WEB</h5>
            </div>
            <ul class="list-unstyled components">
                <p class="menu">MENU DE NAVEGAÇÃO</p>
                <li>
                    <a href="{{route('painel')}}"> <span class="fas fa-home"></span> Painel Inicial</a>
                </li>
                <li>
                    <a href="{{route('leitores')}}"> <span class="fas fa-user"></span> Leitores</a>
                </li>
                <li>
                    <a href="{{route('livros')}}"> <span class="fas fa-book"></span> Livros</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fas fa-share-alt"></span> Emprestimos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('emprestimosAbertos')}}"> <span class="fas fa-book-reader"></span> Abertos</a>
                        </li>
                        <li>
                            <a href="{{route('emprestimoFinalizado')}}"> <span class="fas fa-calendar-check"></span> Finalizados</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="fas fa-user-lock"></span> Administradores</a>
                </li>
            </ul>
        </nav>
    
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg" style="background-color: #7aa8c9;">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <span class="fas fa-bars"></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Bem-Vindo, {{ Auth::user()->nomeAdministrador }} |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logoutAdmin')}}"> <span class="fas fa-sign-out-alt"></span> Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--AQUI VEM AS SEÇÕES -->
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{asset('biblioteca/js/fontawesome.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script type="text/javascript">
        $('#dataEntrada').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
        $('#dataEntrega').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>

</html>