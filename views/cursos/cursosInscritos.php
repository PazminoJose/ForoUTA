<?php
session_start();
$sesssion=$_SESSION["user"];
$user;
$userAvatar;
require("../../controllers/BDController/connectionController.php");
$connection = new connection('localhost','root','','bd_for_grup');
$searchUser="SELECT NIC_USU,FOT_USU FROM usuario  WHERE CED_USU = $sesssion";
$busquedaU=mysqli_query($connection->getConnection(),$searchUser);
if ($row = mysqli_fetch_assoc($busquedaU))
{
    $user=$row["NIC_USU"];
    $userAvatar=$row["FOT_USU"];
}
$search="SELECT c.ID_CUR,c.NOM_CUR,c.PRE_CUR,u.NIC_USU,u.FOT_USU FROM curso c,usuario u 
WHERE c.CED_USU_CREA = u.CED_USU and c.ID_CUR IN (SELECT ID_CUR_PER FROM detalle_curso WHERE CED_USU_PER=$sesssion)";
$busqueda=mysqli_query($connection->getConnection(),$search);

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
                <table id="table" class="table">
                    <thead class="table-dark">
                        <th>Curso</th>
                        <th>Docente</th>
                        <th>Costo</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($busqueda)) {?>
                        <tr>
                            <td><?php echo '<a class="tit-pub" href="cursoInfo.php?curso='.$row['ID_CUR'].'">';
                                    echo $row['NOM_CUR'];
                                    echo "</a>";
                                ?>
                            </td>
                                <td>
                                <a class="tit-pub" href="">
                                    <?php echo $row['NIC_USU']; ?>
                                    </a>
                                </td>
                            
                            <td>
                                    <?php echo $row['PRE_CUR'].'$'; ?>
                            </td>
                            <td>
                                <a onClick="return confirm('¿Esta seguro que desea salir de este curso?');" class="delete" <?php echo 'href="crudCurso.php?action=ddc&curso='.$row['ID_CUR'].'"'?>>Salir Curso</a> 
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>

    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>