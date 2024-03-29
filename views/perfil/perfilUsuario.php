<?php
session_start();
$sesssion=$_SESSION["user"];
$user;
require("../../controllers/BDController/connectionController.php");
$connection = new connection('localhost','root','','bd_for_grup');
//DATOS DEL USUARIO CONECTADO
$searchUser="SELECT * FROM usuario  WHERE CED_USU = $sesssion";
$busquedaU=mysqli_query($connection->getConnection(),$searchUser);
if ($row = mysqli_fetch_assoc($busquedaU))
{
    $nomU=$row["NOM_USU"];
    $apeU=$row["APE_USU"];
    $cedU=$row["CED_USU"];
    $fecNacU=$row["FEC_NAC"];
    $fotU=$row["FOT_USU"];
    $nicU=$row["NIC_USU"];
    $contU=$row["CONT_USU"];
    $corrU=$row["CORR_USU"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/foro.css?v=<?php echo time(); ?>">
    

</head>

<body>


    <!--NavbarSuperior-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo-brand" src="../../assets/images/Screenshot_6.png"
                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a style="padding-top: 15px;" class="nav-link" href="../../forum.php">Pagina Principal</a></li>
                  <li class="nav-item"><a class="nav-link " href="perfilUsuario.php#"><?php echo $nicU; ?> <img class="avatar-user"src="data:image/jpg;base64,<?php echo base64_encode($fotU); ?>" alt=""></a></li>
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
                        <a class="nav-link" href="../cursos/cursosInscritos.php">Inscritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cursos/misCursos.php">Mis Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cursos/verCursos.php">Ver Cursos</a>
                    </li>
                </ul>
            </div>
            <!--ForoPublicaciones-->  
            <div class="col-10">
                <h3 class="perfil-text"><?php echo $nicU; ?></h3>
              <img class="ava_img"src="data:image/jpg;base64,<?php echo base64_encode($fotU); ?>" alt="SIN IMAGEN">
              <a class="edit-perfil" style="text-align:center" href="editPerfil.php" >Editar Perfil</a>
              <ul class="datos">
                <li><b>NOMBRE: </b><?php echo $nomU ?></li>
                
                <li><b>APELLIDO: </b><?php echo $apeU ?></li>
                
                <li><b>CEDULA: </b><?php echo $cedU ?></li>
                
                <li><b>FECHA DE NACIMIENTO: </b><?php echo $fecNacU ?></li>
                
                <li><b>USUARIO: </b><?php echo $nicU ?></li>
                
                <!--<li>CONTRASEÑA: <?php echo "***"; ?></li>-->
                <li><b>CORREO: </b><?php echo $corrU ?></li>
                
              </ul>
            </div>
        </div>

    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>