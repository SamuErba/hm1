<?php
      require_once 'checksessione.php';
      if(!$cliente_id = checkAuth()){
        header("Location: login.php");
        exit;
   }
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $cliente_id= mysqli_real_escape_string($conn, $cliente_id);
    $query = "SELECT * FROM cliente WHERE id_cliente = $cliente_id";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mhw2.css"> 
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <script src="eventi.js" defer="true" ></script>
    <script src="eventi_contents.js" defer="true" ></script>
    <title>Eventi</title>
</head>
<body>
    <header>      
        <nav>
          <div id="logo">
            <img src="logo.png" />
          </div>
          <div id="ricerca">
          <input type="text"/>
          </div>
          <div id="links">  
            <a href="http://google.it" class="header2_Servizi">Servizi</a>
            <a href="http://google.it" class="header2_Eventi">Eventi</a>
            <a href="http://google.it" class="header2_Animazione">Prenotazione</a>
          </div>
        </nav>
    </header>
    <section id="preferiti" class="hidden">
      
    </section>
    <section id="box_eventi">
    </section>
    <footer>
      <div id="final">
          <div id="ref">
          <a href="http://google.it" class="div_final">Dove siamo</a>
          <a href="http://google.it" class="div_final">Contatti</a>
          </div>
          <div id="social">
              <a>seguici anche sui social:</a>
              <img src="fb.png">
          </div>
          <a>Powerd by ERBA SAMUEL</a>   
      </div>
  </footer>
</body>
</html>