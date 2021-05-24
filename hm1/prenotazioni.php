
<?php  
//require_once 'checksessione.php';
//if (!$userid = checkAuth()) {
//   header("Location: login.php");
//    exit;
//}
if (!empty($_POST["data"]) && !empty($_POST["luogo"]) )

{
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $data = mysqli_real_escape_string($conn,$_POST['data']);
    $luogo = mysqli_real_escape_string($conn,$_POST['luogo']);   

    $query = "INSERT INTO prenotazione(data,luogo) VALUES ('$data','$luogo')";
}

?>

<html>
    <head>
        <link rel='stylesheet' href='./style/prenotazione.css'>
        <script src='./scripts/prenotazione.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8">
    </head>
    <body>
        <title>La Palma Blu - Prenota</title>
        <section>
        <form name='prenotazione' method='post'>
            <div class="data">
                <div><label for="data">Inserisci la data</label></div>
                <div><input type='data' nome='data'></div>
                <div><label for="luogo">Inserisci il luogo</label></div>
                <div><input type='luogo' nome='luogo'></div>
            </div>
            <div>
                <input id='button' type='submit' value="Prenota">
            </div>
        </form>
    </section>
    </body>
</html>