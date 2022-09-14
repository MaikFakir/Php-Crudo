<?php
  include('../php/conexion.php');
//seguridad de sesiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION["usuario"];

$consulta = "SELECT CONCAT(nombre, ' ', apellido) As Nombre From usuarios WHERE correo ='$varsesion'";
$resultado = mysqli_query($con,$consulta);
$filas=mysqli_fetch_array($resultado);

if($varsesion == null || $varsesion == ''){
    //echo "no tienes acceso";
    header("location:../index.html");
    die();
}
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="../css/styledc.css">

        <title>Document</title>
    </head>

    <body>
    <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image"><img src="../img/Logo ViVi sin fondos.png" alt="" ></span>

                    <div class="text logo-text">
                        <span class="name"> <?php echo $filas[0]; ?> </span>
                        <span class="profession">Cliente</span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="Dashboard_Inicio.html" target="principal">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Dasboard_Cliente.html" target="principal">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">General</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Dasboard_Usuario.html " target="principal">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Usuario</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Dashboard_pedidos.html" target="principal">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Mis pedidos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="PQRS.html" target="principal">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">PQRS</span>
                        </a>
                    </li>
                </ul>
            </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="../php/cerrar_sesion.php">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Cerrar Sesion</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Modo Oscuro</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>

                </div>
            </div>

        </nav>
        <section class="home">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">

                    <li class="nav-item" style="list-style: none;">
                        <a class="nav-link" href="../Index.html">Inicio</a>
                    </li>
                    <li class="nav-item dropdown" style="list-style: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Users
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Dasboard_Usuario.html" target="principal">Mi cuenta</a></li>
                            <li><a class="dropdown-item" href="Config_User_data.html" target="principal">Configuraciones</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
                        </ul>
                </div>
                </div>
            </nav>
            <!-- <main>
            <iframe name="principal" src="../Index.html" target="principal" width="100%" frameborder="0"></iframe>
        </main> -->
            <!--  <iframe name="principal" target="principal" src="Dashboard_Inicio.html" width="100%" height="91%" allow="fullscreen" class="iframecontainer"></iframe>-->
        </section>
        <script>
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                searchBtn = body.querySelector(".search-box"),
                modeSwitch = body.querySelector(".toggle-switch"),
                modeText = body.querySelector(".mode-text");


            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            })

            searchBtn.addEventListener("click", () => {
                sidebar.classList.remove("close");
            })

            modeSwitch.addEventListener("click", () => {
                body.classList.toggle("dark");

                if (body.classList.contains("dark")) {
                    modeText.innerText = "Modo Claro";
                } else {
                    modeText.innerText = "Modo Oscuro";

                }
            });
        </script>
    </body>

    </html>