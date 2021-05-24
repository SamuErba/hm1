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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Palma Blu</title>
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/home.css">
</head>
<body>
<header>      
    <nav>
      <div id="logo">
        <img src="logo.png" />
      </div>
      <div id="links">  
        <a href="http://google.it" class="header2_Servizi">Servizi</a>
        <a href="http://google.it" class="header2_Eventi">Eventi</a>
        <a href="http://google.it" class="header2_Animazione">Prenotazione</a>
      </div>
    </nav>
</header>
    <section>
        <div id="strutture">
            <h1>
                Vienici a trovare in una delle nostre strutture
            </h1>
        </div>

        <div id="lido">
            <img src="lido.jpg">
            <div id="details">
            <h1>Il Lido La Palma Blu</h1>
            <p>
                Il nostro lido si trova nel golfo di Catania,vieni a trovarci per trascorrere una giornata di relax
                in uno dei mari più belli di sicilia. La location è accogliente e priva di qualsiasi stress.
            </p>
            </div>
        </div>
        <div id="piscina">
            <img src="piscina.jpg">
            <div id="details2">
                <h1>La Pascina La Palma Blu</h1>
                <p>
                    La nostra piscina si trova in una posizione strategica,dove potrai ammirare l'etna.L'animazione
                    ti garantisce una giornatadi totale divertimento.
                </p>
            </div>
        </div>
    </section>
    <div id="sec2">
        <div id="news">
            <img src="news.png">
             <h1> NEWS</h1>
        </div>
        <div id="promozioni">
            <h1> Scopri le nostre promozioni</h1>
            <img src="promozioni.jpg">
        </div>
        <div id="mess">
            <a href="http://google.it" class="div_mess">Vieni a trovarci per scoprire le nostre promozioni,oppure scopri qui la soluzione più ideale per te.</a>
        </div>
    </div>
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
<?php mysqli_close($conn); ?>