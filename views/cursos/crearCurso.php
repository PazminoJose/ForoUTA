<?php
session_start();
$sesssion=$_SESSION["user"];
$user;
$userAvatar;
require("../../controllers/BDController/connectionController.php");
$connection = new connection('localhost','root','','bd_for_grup');
//DATOS DEL USUARIO CONECTADO
$searchUser="SELECT NIC_USU,FOT_USU FROM usuario  WHERE CED_USU = $sesssion";
$busquedaU=mysqli_query($connection->getConnection(),$searchUser);
if ($row = mysqli_fetch_assoc($busquedaU))
{
    $user=$row["NIC_USU"];
    $userAvatar=$row["FOT_USU"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/foro.css?v=<?php echo time(); ?>">
    <title>Document</title>
   

</head>

<body>


    <!--NavbarSuperior-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../forum.php"><img class="logo-brand" src="../../assets/images/Screenshot_6.png"
                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link " href="../perfil/perfilUsuario.php#"><?php echo $user; ?> <img class="avatar-user"src="data:image/jpg;base64,<?php echo base64_encode($userAvatar); ?>" alt=""></a></li>
                <li class="nav-item"><a style="padding-top: 15px;" class="nav-link" href="../../controllers/session/sessionClose.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="padding-top: 100px;">
        <div class="row">
            <!--NavbarIzquierda-->
            <div class="col-2  border border-3 border-dark text-center" style="padding-bottom: 15.3%; background-color:#6c757d;">
                <h3 class="nav-foro fw-bold">PUBLICACIONES</h3>
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="../../forum.php">Todas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../publicaciones/misPublicaciones.php">Mis Publicaciones</a>
                    </li>
                    <h3 class="nav-foro fw-bold">CURSOS</h3>
                    <li class="nav-item">
                        <a class="nav-link" href="cursosInscritos.php">Inscritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="misCursos.php">Mis Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="verCursos.php">Ver Cursos</a>
                    </li>
                </ul>
            </div>
            <!--ForoPublicaciones-->
            <div class="col-10">
            <table class="table">
                    <thead class="table-dark">
                        <th>Crear Cursos</th>
                        <th></th>
                        <th></th>
                    </thead>
                  
                </table>
                <div class="mb-4">
                <form action="crudCurso.php?action=c" method="POST">
                <div class="form-floating mb-3">
                <input type="text" name="nomcur" class="form-control" id="floatingInput" placeholder="Nombre del Curso" required autofocus>
                <label for="floatingInput">Nombre del Curso</label>
                </div>
                <div class="form-floating mb-3">
                <textarea class="form-control" name="descur" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Descripcion del Curso</label>
                </div>
                </div>
                <div class="form-floating mb-3">
                <input type="Number" name="precur" class="form-control" id="floatingInput" style="width: 170px; display: inline-block;" min="0" value="0" placeholder="Nombre del Curso">
                <label for="floatingInput">Precio (Opcional)</label>
                <input type="submit" style="display: inline-block;" class="create" value="Crear">
                </div>         
                
                </form>                 
                </div>              
        </div>

    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>