<?php
  
    require_once 'dbconfig.php';
    session_start();

    function checkAuth() {
        
        if(isset($_SESSION['cliente_id'])) {
            return $_SESSION['cliente_id'];
        } else 
            return 0;
    }
?>