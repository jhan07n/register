
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <title>Turismo Digital - Registro</title>
</head>

<body>
  <img src="head.png" alt="Turismo Digital">

  <div class="content text-center">

    <div class="w3-container">
      <div class="row">
        <div class="col col-2"></div>
        <div class="col">
          <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'confirmar');">
              <div id="cc" class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding">
                Confirmación</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'registro');">
              <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red">Registro</div>
            </a>
          </div>
        </div>
        <div class="col col-2"></div>
      </div>

      <br>
      <br><br>
      <div id="confirmar" class="w3-container city" style="display:none">
        <h2>Código de Confirmación</h2><br>
        <input placeholder="TUR2019JNC" id="confirm" maxlength="10">
        <br><br><br><br><br>
        <button id="accept" data-toggle="modal" href="#ignismyModal" >Aceptar</button>
        <button id="clear">Limpiar</button>
      </div>

      <form action="" method="post">
      <div id="registro" class="w3-container city" style="display:none">
        <h2>Nombre completo</h2>
        <input placeholder="John Doe" name="nombre" type="text" id="confirm" maxlength="20"><br><br>
        <h2>Correo</h2>
        <input placeholder="tucorreo@dominio.com" name="correo" type="email" id="confirm" maxlength="50"><br><br>
        <h2>Institución</h2>
        <input placeholder="MINTUR" id="confirm" type="work" name="work" maxlength="20">
        <br><br><br><br><br>
        <button type="summit" name="accept" id="accept">Aceptar</button>
        <button id="clear">Limpiar</button>
      </div>
    </form>
    </div>
    
    <div class="modal fade" id="ignismyModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                 </div>
      
                <div class="modal-body">
                   
        <div class="thank-you-pop">
          <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
          <h1>Registrado!</h1>
          <p>Su codigo de registro es: <span style="color:#002666">TUR2019</span><h2 style="color:#A92729">06</h2></p>
          
         </div>
                     
                </div>
      
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
      <script>
          document.getElementById("registro").style.display = "block";
          function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
          }
        </script>
       
       <?php
    $con = mysqli_connect("localhost", "u788306272_admin", "bF-64.sQ@", "u788306272_TUR");
    if(isset($_POST['accept'])){
          $nombre= utf8_decode($_POST['nombre']);
          $correo = $_POST['correo'];
          $work = $_POST['work'];


    if($con){

      $sql= "SELECT ID,CORREO from CONFIRMACION WHERE CORREO = '\". $correo . \"'";
      $result = mysqli_query($con,$sql);
      if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
      $row = mysql_fetch_row($result);
      
      if(is_numeric($row[0])){
        $codigo= $row[0];
        sen();
      }
        else{

      $sql="INSERT INTO PARTICIPANTE (NOMBRE, CORREO, INSTITUCION) VALUES ('". $nombre . "','" .$correo . "','" .$work . "')";
      $result = mysqli_query($con,$sql);

        $sql= "SELECT id from PARTICIPANTE WHERE CORREO = '\". $correo . \"'";
        $result = mysqli_query($con,$sql);
        if (!$result) {
          echo 'Could not run query: ' . mysql_error();
          exit;
      }
      $row = mysql_fetch_row($result);
      
      if(is_numeric($row[0])){
        $codigo= $row[0];
        sen();
      }
      echo '<script>$("#ignismyModal").modal();</script>';
      
      /* else{
        echo $sql;
      } */
    }
 
  }
    else{
      echo $con;
    }
  
  

  }

  function sen(){
    $to = $_POST["correo"];
    $firstname = $_POST["nombre"];
    $subject= "Foro Turismo Digital Código:";
    $email= $_POST["correo"];
    $text= "Hola esto es una prueba";
    

    $headers .= "Centro Indotel: Soporte Centro Indotel\r\n";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: Soporte Foro Turismo Digital <foro@turismodigital.do> \r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
    
    
    $message ='<div style="width:70%;text-align: justify;padding-left:2rem;@font-face {font-family: "Nexa";src: url("http://turismodigital.tech/nexa/Nexa-Bold.otf");src: url("http://turismodigital.tech/nexa/Nexa-Bold.otf") format("opentype"),}; font-family: Nexa;">
    <b>Buenas tardes </b><br><br>

    Luego de un cordial saludo, le escribimos con relación al 1er. Foro de Turismo Digital “Ciudad Colonial -Primer Destino Inteligente RD”. 
    <br><br>
    En ese sentido, le enviamos el código de confirmación para su asistencia, el cual debe ser presentado a su llegada al Centro Indotel. 
    <br><br>
    Código de confirmación: <p style="color:#002666;font-size:20px;">TUR2019<b style="color:#A92729;font-size:20px;">'.$codigo .'</b></p>
    <br><br>
    <b>Fecha:</b> Miércoles 13 de noviembre <br>
    <b>Hora:</b> 8:00 a.m. <br>
    <b>Lugar:</b> Centro Indotel Espacio República Digital, C/ Isabel la Católica Esq. Emiliano Tejera, Ciudad Colonial. 
    <br><br>
    Te esperamos! <br><br>
<img style="width:35rem;" src="https://images.squarespace-cdn.com/content/v1/5dbd1974270af32a346ce312/1573157509781-698YQJDP8PX7AH6TABDU/ke17ZwdGBToddI8pDm48kHXg06755pw7ZzeluOAVCHsUqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYy7Mythp_T-mtop-vrsUOmeInPi9iDjx9w8K4ZfjXt2diTK97QdQpnbkoCVDRSlSowOclHDKfATSpfj50jh0bs3CjLISwBs8eEdxAxTptZAUg/logos.png?format=1500w">
    <br><br><br><br>
    <i>Favor no contestar este correo</i>
        
    </div>';

    if (@mail($to, $subject, $message, $headers))
    {
        echo 'El mensaje ha sido enviado.';
    }else{
        echo 'Ha ocurrido un error.';
    }
  }
    
    
?>
</body>

</html>

