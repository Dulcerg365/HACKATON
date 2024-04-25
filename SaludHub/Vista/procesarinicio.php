<?php
    require_once('../Datos/DAOUsuario.php');
    
    //Verificar que llegan datos
    if(ISSET($_POST["email"]) && ISSET($_POST["contrasenia"])){
        //Conectarme y buscar usuario
        $dao=new DAOUsuario();
        $usuario=$dao->autenticar($_POST["email"],$_POST["contrasenia"]);
        if($usuario){
            session_start();
            $_SESSION["idusuario"]=$usuario->idusuario;
            $_SESSION["email"]=$usuario->usuario;
            $_SESSION["nombre"]=$usuario->nombre;
            $_SESSION["contrasenia"]=$usuario->contrasenia;
            $_SESSION["direccion"]=$usuario->direccion;
            $_SESSION["edad"]=$usuario->edad;
            $_SESSION["apellidos"]=$usuario->apellidos;
            $_SESSION["celular"]=$usuario->apellidos;

            if ($_POST["email"] == "Admin") {
                header("Location: inicioAdmin.html");
            } else if (stristr($_POST["email"], '@gmail.com') !== false) {
                header("Location: inicio.html");
            } else {
                header("Location: CrudCitas.html");
            }
                    
            return;
        }
    }
    header("Location: login.html");
    
    
?>