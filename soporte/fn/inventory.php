<?php
session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){


  include 'connect.php';
  switch ($_POST['action']) {
    case 'load_area':  //Carga de areas
      $areas="";
      $query = "SELECT id_area, area FROM areas ORDER BY area";
      $resultado = $conectar->query($query);
        if ($resultado->num_rows> 0){
          while ($row1= $resultado->fetch_assoc()) {
            $areas.="<option value='".$row1['id_area']."'>".$row1['area']."</option>";
          }
          echo $areas;
        }
      break;
    case 'tabla_equipos':  //carga de equipos
      $usuarios="";
      $supos = 'GROUP_CONCAT(nombre_usuario separator "<br>")';
      // SELECT GROUP_CONCAT(id_equipo), nombre_equipo, count(*) FROM equipos GROUP BY nombre_equipo HAVING COUNT(*)>1 //duplicados
      $q = $conectar->real_escape_string($_POST['area']);
      $query = "SELECT area, nombre_equipo, tipo, $supos, equipos.id_equipo, comentarios FROM areas
                                                                                          JOIN equipos ON equipos.id_area = areas.id_area
                                                                                          JOIN cpu ON equipos.id_equipo = cpu.id_equipo
                                                                                     left JOIN usuarios ON usuarios.id_equipo = equipos.id_equipo
                                          WHERE area LIKE '$q' OR tipo LIKE '$q' OR nombre_equipo LIKE '%".$q."%' GROUP BY id_equipo  ORDER By nombre_equipo "; //GROUP BY nombre_equipo
        $resultado = $conectar->query($query);
        if ($resultado->num_rows> 0){
          $usuarios.="<table class='table table-hover's>
                        <thead>
                          <tr>
                            <th scope='col'>Área</th>
                            <th scope='col'>Equipo</th>
                            <th scope='col'>Tipo</th>
                            <th scope='col'>Usuarios</th>
                            <th scope='col'>ID equipo</th>
                            <th scope='col'>Comentarios</th>
                            <th scope='col' class='Total:'></th>
                          </tr>
                        </thead>
                        <tbody>";
            while ($row2 = $resultado->fetch_assoc()) {
              $usuarios.=
              "<tr>
                  <td scope='row'>".$row2['area']."</td>
                  <td scope='row'>".$row2['nombre_equipo']."</td>
                  <td scope='row'>".$row2['tipo']."</td>
                  <td scope='row'>".$row2['GROUP_CONCAT(nombre_usuario separator "<br>")']."</td>
                  <td scope='row' class='items'>".$row2['id_equipo']."</td>
                  <td scope='row'><span>+</span>".$row2['comentarios']."</td>
                  <td scope='row'><button class='detalles' value='".$row2['id_equipo']."'>Detalles</button></td>
              <tr>";
            }
          $usuarios.="</tbody></table";
          }else {
            $usuarios='sin resultados';
          }
        echo $usuarios;
      break;
    case 'detalles':  //carga detallada
      $detalles = '';                //se crea una variable para la salida
      //$q = $_POST["detalles"];       //se ajunta la entrada a una variable //vulberable
      $q = $conectar->real_escape_string($_POST['detalles']); //se ajunta la entrada a una variable //Proteccion de SQL Injection
      $query = "SELECT *,equipos.id_equipo as idEquipo FROM equipos LEFT JOIN cpu on equipos.id_equipo = cpu.id_equipo
                                      LEFT JOIN bocina on equipos.id_equipo = bocina.id_equipo
                                      LEFT JOIN mouse on equipos.id_equipo = mouse.id_equipo
                                      LEFT JOIN monitor on equipos.id_equipo = monitor.id_equipo
                                      LEFT JOIN teclado on equipos.id_equipo = teclado.id_equipo
                                      LEFT JOIN nobreake on equipos.id_equipo = nobreake.id_equipo
                                      LEFT JOIN cargador on equipos.id_equipo = cargador.id_equipo
                                      -- LEFT JOIN usuarios on equipos.id_equipo = usuarios.id_equipo
                                      WHERE equipos.id_equipo = '$q'"; //se crea un strng de consulta
      // $resultado = $conectar->query($query); //resultado es igual a $conexion -> funncion buscar(string de consulta)
      $resultado = mysqli_query($conectar, $query); //resultado es igual a $conexion -> funncion buscar(string de consulta)
      if ($resultado->num_rows> 0) {
        $detalles.="<div class='tarjeta'>";
                    while ($row2 = $resultado->fetch_assoc()) {
                      $detalles.=
                          "<fieldset class='eq'>
                            <legend>Información del equipo</legend>
                              <span>ID equipo: </span>".$row2['idEquipo']."
                            <p>Nombre equipo ".$row2['nombre_equipo']."</p>
                            <p>Caracteristicas: ".$row2['caracteristicas']."</p>
                            <p>Tipo: ".$row2['tipo']."</p>
                            <p>RAM: ".$row2['ram']."</p>
                          </fieldset>

                          <fieldset class='cp'>
                          <legend>CPU</legend>
                            <p>Marca: ".$row2['marca']."</p>
                            <p>Modelo: ".$row2['modelo']."</p>
                            <p>Número de serie: ".$row2['num_serie']."</p>
                          </fieldset>

                          <fieldset class='b'>
                          <legend>Bocinas</legend>
                            <p>Marca: ".$row2['marca_b']."</p>
                            <p>Modelo: ".$row2['modelo_b']."</p>
                            <p>Número de serie: ".$row2['num_serie_b']."</p>
                          </fieldset>

                          <fieldset class='m'>
                          <legend>Mouse</legend>
                            <p>Marca: ".$row2['marca_m']."</p>
                            <p>Modelo: ".$row2['modelo_m']."</p>
                            <p>Número de serie: ".$row2['num_serie_m']."</p>
                          </fieldset>

                          <fieldset class='mn'>
                          <legend>Monitor</legend>
                            <p>Marca: ".$row2['marca_mn']."</p>
                            <p>Modelo: ".$row2['modelo_mn']."</p>
                            <p>Número de serie:".$row2['num_serie_mn']."</p>
                          </fieldset>

                          <fieldset class='t'>
                          <legend>Teclado</legend>
                            <p>Marca: ".$row2['marca_t']."</p>
                            <p>Modelo: ".$row2['modelo_t']."</p>
                            <p>Número de serie: ".$row2['num_serie_t']."</p>
                          </fieldset>

                          <fieldset class='nb'>
                          <legend>No Break</legend>
                            <p>Marca: ".$row2['marca_nb']."</p>
                            <p>Modelo: ".$row2['modelo_nb']."</p>
                            <p>Número de serie:".$row2['num_serie_nb']."</p>
                          </fieldset>

                          <fieldset class='c'>
                          <legend>Cargador</legend>
                            <p>Marca: ".$row2['marca_c']."</p>
                            <p>Modelo: ".$row2['modelo_c']."</p>
                            <p>Número de serie: ".$row2['num_serie_c']."</p>
                          </fieldset>

                      ";
                    }
                  $detalles.="</div>";
              }else {
                $detalles = "No hay datos";
              }
          echo $detalles;
      break;
    case 'nuevo_equipo': //agrgar equipo
        //equipos
        $id = '';
        $id_equipo='';
        $area = $_POST["area"];
        $nombre_equipo = $_POST["nombre_equipo"];
        //cpu
        $caracteristicas = $_POST["caracteristicas"];
        $ram = $_POST["ram"];
        $tipo_cpu = $_POST["tipo_cpu"];
        $marca_cpu = $_POST["marca_cpu"];
        $modelo_cpu = $_POST["modelo_cpu"];
        $serie_cpu = $_POST["serie_cpu"];
        //insercion de equipo
        $sql_equipo="INSERT INTO equipos (id_equipo, id_area, nombre_equipo)
                          VALUES('$id', '$area', '$nombre_equipo')";
        $nuevo_equipo=mysqli_query($conectar, $sql_equipo);
          if($nuevo_equipo){
            // printf ("Nuevo registro con el id %d.\n", $conectar->insert_id);
              $id_equipo = $conectar->insert_id; //last id
            }else{
              echo mysqli_error($conectar);
              print_r($_POST);
            };
        //cpu
        $sql_cpu="INSERT INTO cpu (id_equipo, caracteristicas, ram, tipo, marca, modelo, num_serie)
                        VALUES('$id_equipo', '$caracteristicas', '$ram', '$tipo_cpu', '$marca_cpu', '$modelo_cpu', '$serie_cpu')";
        $nuevo_cpu=mysqli_query($conectar, $sql_cpu);
        if ($nuevo_cpu) {
          echo "CPU agregado <br>";
        }else {
          echo mysqli_error($conectar);
        }
        //Bocina
        if (isset($_POST["marca_b"])) {
          $marca_b = $_POST["marca_b"];
          $modelo_b = $_POST["modelo_b"];
          $numserie_b = $_POST["num_serie_b"];
            $sql_bocina="INSERT INTO bocina (id_equipo, marca_b, modelo_b, num_serie_b)
                                   VALUES('$id_equipo', '$marca_b', '$modelo_b', '$numserie_b')";
            $nueva_bocina=mysqli_query($conectar, $sql_bocina);
              if ($nueva_bocina) {
                echo "Bocina agregada <br>";
              }else {
                echo mysqli_error($conectar);
              }
            }
        //mouse
        if (isset($_POST["marca_m"])) {
          $marca_m = $_POST["marca_m"];
          $modelo_m = $_POST["modelo_m"];
          $numserie_m = $_POST["num_serie_m"];
          $sql_mouse="INSERT INTO mouse (id_equipo, marca_m, modelo_m, num_serie_m)
                                 VALUES('$id_equipo', '$marca_m', '$modelo_m', '$numserie_m')";
          $nueva_mouse=mysqli_query($conectar, $sql_mouse);
            if ($nueva_mouse) {
              echo "Mouse agregado <br>";
            }else {
              echo mysqli_error($conectar);
            }
         }
        //monitor
        if (isset($_POST["marca_mn"])) {
          $marca_mn = $_POST["marca_mn"];
          $modelo_mn = $_POST["modelo_mn"];
          $numserie_mn = $_POST["num_serie_mn"];
          $sql_monitor="INSERT INTO monitor (id_equipo, marca_mn, modelo_mn, num_serie_mn)
                                 VALUES('$id_equipo', '$marca_mn', '$modelo_mn', '$numserie_mn')";
          $nueva_monitor=mysqli_query($conectar, $sql_monitor);
            if ($nueva_monitor) {
              echo "Monitor agregado <br>";
            }else {
              echo mysqli_error($conectar);
            }
        }
        //teclado
        if (isset($_POST["marca_t"])) {
        $marca_t = $_POST["marca_t"];
        $modelo_t = $_POST["modelo_t"];
        $numserie_t = $_POST["num_serie_t"];
        $sql_teclado="INSERT INTO teclado (id_equipo, marca_t, modelo_t, num_serie_t)
                               VALUES('$id_equipo', '$marca_t', '$modelo_t', '$numserie_t')";
        $nueva_teclado=mysqli_query($conectar, $sql_teclado);
          if ($nueva_teclado) {
            echo "Teclado agregado <br>";
          }else {
            echo mysqli_error($conectar);
          }
        }
        //noBrake
        if (isset($_POST["marca_nb"])) {
        $marca_nb = $_POST["marca_nb"];
        $modelo_nb = $_POST["modelo_nb"];
        $numserie_nb = $_POST["num_serie_nb"];
        $sql_nobreake="INSERT INTO nobreake (id_equipo, marca_nb, modelo_nb, num_serie_nb)
                               VALUES('$id_equipo', '$marca_nb', '$modelo_nb', '$numserie_nb')";
        $nueva_nobreake=mysqli_query($conectar, $sql_nobreake);
          if ($nueva_nobreake) {
            echo "No Break agregado <br>";
          }else {
            echo mysqli_error($conectar);
          }

        }
        //cargador
        if (isset($_POST["marca_c"])) {
          $marca_c = $_POST["marca_c"];
          $modelo_c = $_POST["modelo_c"];
          $numserie_c = $_POST["num_serie_c"];
          $sql_cargador="INSERT INTO cargador (id_equipo, marca_c, modelo_c, num_serie_c)
                                 VALUES('$id_equipo', '$marca_c', '$modelo_c', '$numserie_c')";
          $nueva_cargador=mysqli_query($conectar, $sql_cargador);
            if ($nueva_cargador) {
              echo "Cargador agregado <br>";
            }else {
              echo mysqli_error($conectar);
            }
        }
      break;
  }
  $conectar->close();

}else{
die('<script>window.location="../index.php";</script>');
}
?>
