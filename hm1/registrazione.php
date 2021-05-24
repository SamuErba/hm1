<?php
require_once 'checksessione.php';

if (checkAuth()) {
    header("Location: home.php");
    exit;
}   


if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]))
{
    $error = array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    
   
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $query = "SELECT username FROM cliente WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }
    
    if (strlen($_POST["password"]) < 8) {
        $error[] = "Caratteri password insufficienti";
    } 
    
    if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
        $error[] = "Le password non coincidono";
    }
    
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM cliente WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }

    
    if (count($error) == 0) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO cliente( username, password,email,) VALUES('$username', '$password','$email')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION["'cliente_id"] = $_POST["username"];
            $_SESSION["'cliente_id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: home.php");
            exit;
        } else {
            $error[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn);
}
else if (isset($_POST["username"])) {
    $error = array("Riempi tutti i campi");
}

?>

<html>
    <head>
        <link rel='stylesheet' href='./style/registrazionelogin.css'>
        <script src='./scripts/registrazionelogin.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8">

        <title>La Palma Blu - Iscriviti</title>
    </head>
    <body>
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Presentati</h1>
            <form name='registrazione' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username'></div>
                    
                </div>
                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email'></div>
                    
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
                    
                </div>
                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password'></div>
                    
                </div>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="login.php">Accedi</a>
        </section>
        </main>
    </body>
</html>