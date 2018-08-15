<?php

/**
 * Connessione al database MySql
 * @author Roberto Gianotto
 */

function database_connection(){
    // parametri di connessione
    $host = HOSTNAME;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $db = DB_NAME;
    // effettua la connessione
    if(mysqli_connect($host,$user,$password,$db)){
        echo "Ti sei connesso al DB";
    }else{
        echo "Errore di connessione al DB";
    }
}

