<?php
  include 'connect.php';
if (!empty($_POST)){
  $user = $_POST["usuario"];
  $pass = $_POST["contraseña"];
  $hashdpass = password_hash($pass, PASSWORD_DEFAULT);
  // $res = mysqli_query($conectar, "SELECT * FROM login WHERE usuario = '$user' AND pass = '$pass'");//
  //   if ($res->num_rows>0){
  //     while ($row = mysqli_fetch_array($res)) {
  //                 @session_start();
  //                 $_SESSION["usuario"]=$row["usuario"];
  //                 $_SESSION["tipo_admin"]=$row["tipo_admin"];
  //                 $_SESSION["tema"]=$row["tema"];
  //                 header('Location: ../index.php');
  //       }
  //     }else{
  //       header('Location: ../login.php');
  //       @session_start();
  //       $_SESSION["message"]="Datos Incorrectos";
  //   }
  $res = mysqli_query($conectar, "SELECT * FROM login WHERE usuario = '$user'");// AND pass = '$pass'
    if ($res->num_rows>0){
      while ($row = mysqli_fetch_array($res)) {
            //password verify
            if (password_verify($pass, $row["pass"])) {
                  @session_start();
                  $_SESSION["usuario"]=$row["usuario"];
                  $_SESSION["nombre"]=$row["nombre"];
                  $_SESSION["tipo_admin"]=$row["tipo_admin"];
                  $_SESSION["tema"]=$row["tema"];

                  header('Location: ../index.php');
                }
              //password verify

                else {
                  header('Location: ../login.php');
                  @session_start();
                  $_SESSION["message"]="contraseña incorrecta";
                }
        }
      }else{
        header('Location: ../login.php');
        @session_start();
        $_SESSION["message"]="Datos Incorrectos";
    }
  }
 ?>
