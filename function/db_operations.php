<?php

/**
 * Operazioni sul database
 */

/**
 * Istanzia una nuova connessione con il database
 * @return mysqli
 */
function connetti(){
    $host = HOSTNAME;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $db = DB_NAME;
    // effettua la connessione
    $mysqli = new mysqli($host,$user,$password,$db);
    if($mysqli->connect_error){
        echo "Errore di connessione al DB";
    }
    return $mysqli;
}

/**
 * Chiude la connessione con il database
 * @param $mysqli
 */
function chiudi_connessione($mysqli){
    $mysqli->close();
}

/**
 * Questa funziona ritorna tutte le spese presenti in tabella
 */
function mostra_tutti(){
    $mysqli = connetti();
    // query
    $sql = "SELECT * FROM spesa WHERE 1=1";
    // memorizzo il risultato della query
    $risultato_query = $mysqli->query($sql);
    // Stampa a video tutti i risultati presenti nel DB
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    // chiude connessione con il DB
    chiudi_connessione($mysqli);
    // ritorni un array pieno di valori
    return $array_righe;
}

// FUNZIONI DI ORDINAMENTO DELA VISUALIZZAZIONE DEI RECORD

/**
 * Ordina la tabella dei record per titolo di spesa
 * @return array
 */
function ordina_nome(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY titolo_spesa ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina i record sulla base dell'id
 * @return array
 */
function ordina_id(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY id ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina tutti i record sulla base della tipologia di spesa
 * @return array
 */
function ordina_tipologia(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY tipologia_spesa ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina tutti i record sulla base del nome dell'autore
 * @return array
 */
function ordina_autore(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY autore_spesa ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina tutti i record sulla base dell'importo della spesa
 * @return array
 */
function ordina_importo(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY importo_spesa DESC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina per data di scadenza tutte le spese
 * @return array
 */
function ordina_data_scadenza(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY data_scadenza_spesa ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Ordina tutte le spese sulla base della data di pagamento della spesa
 * @return array
 */
function ordina_data_pagamento(){
    $mysqli = connetti();
    $sql = "SELECT * FROM spesa WHERE 1=1 ORDER BY data_pagamento_spesa ASC";
    $risultato_query = $mysqli->query($sql);
    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }
    chiudi_connessione($mysqli);
    return $array_righe;
}

/**
 * Elimina un record passandogli l'id
 */
function elimina_record($id){

    $mysqli = connetti();

    $sql = "DELETE FROM spesa WHERE id =" . $id;

    //var_dump($sql); die();

    $mysqli->query($sql);
    chiudi_connessione($mysqli);
}


/**
 * Inserisce un nuovo record nel database
 */
function inserisci_record(Spesa $spesa){
    //variaibili che arrivano dall'oggetto creato
    $titolo = $spesa->getTitoloSpesa();
    $tipologia = $spesa->getTipologiaSpesa();
    $data_p = converti_data_pagamento_spesa($spesa->getDataPagamentoSpesa());
    $data_s = converti_data_scadenza_spesa($spesa->getDataScadenzaSpesa());
    $autore = $spesa->getAutoreSpesa();
    $importo = verifica_importo_spesa($spesa->getImportoSpesa());

    $mysqli = connetti();

    $sql = "INSERT INTO `spesa` (`titolo_spesa`, `tipologia_spesa`, `data_pagamento_spesa`, `data_scadenza_spesa`, `autore_spesa`, `importo_spesa`) 
            VALUES('$titolo','$tipologia','$data_p','$data_s','$autore',$importo)";

    if($mysqli->query($sql)){
        header("Location:index.php");
    }else{
        header("Location:inserisci_spesa.php");
    }
    chiudi_connessione($mysqli);
}

/**
 * Modifica un record sulla base dell'id
 * @param $id
 */
function modifica_record($id,Spesa $spesa){
    //campi della spesa
    $titolo_modificato = $spesa->getTitoloSpesa();
    $tipologia_modificata = $spesa->getTipologiaSpesa();
    $data_pagamento_modificata = $spesa->getDataPagamentoSpesa();
    $data_scadenza_modificata = $spesa->getDataScadenzaSpesa();
    $autore_modificato = $spesa->getAutoreSpesa();
    $importo_modificato = verifica_importo_spesa($spesa->getImportoSpesa());

    $mysqli = connetti();

    $sql = "UPDATE spesa SET  
            titolo_spesa = '".$titolo_modificato."',
            tipologia_spesa = '".$tipologia_modificata."',
            data_pagamento_spesa = '".$data_pagamento_modificata."',
            data_scadenza_spesa = '".$data_scadenza_modificata."',
            autore_spesa = '".$autore_modificato."',
            importo_spesa = ".$importo_modificato." 
            WHERE id = " . $id;

    if($mysqli->query($sql)){
        header("Location:index.php");
    }else{
        header("Location:errore.php");
    }

    chiudi_connessione($mysqli);
}

/**
 * Seleziona una spesa sulla base dell'id dato in input
 * @param $id
 * @return array
 */
function seleziona_spesa($id){

    $mysqli = connetti();

    $sql = "SELECT * FROM spesa WHERE id = " . $id;

    // memorizzo il risultato della query
    $risultato_query = $mysqli->query($sql);

    $array_righe = [];
    while($righe_tabella = $risultato_query->fetch_array(MYSQLI_ASSOC)){
        $array_righe[] = $righe_tabella;
    }

    chiudi_connessione($mysqli);

    return $array_righe;
}

/**
 * @return mixed
 */
function somma_totale_spese(){
    $mysqli = connetti();
    $sql = "SELECT SUM(importo_spesa) FROM spesa";
    $risultato_query = $mysqli->query($sql);
    $ris = $risultato_query->fetch_row();
    chiudi_connessione($mysqli);
    return $ris[0];
}

/**
 * @return mixed
 */
function somma_totale_spese_mese(){
    $mysqli = connetti();
    $sql = "SELECT SUM(importo_spesa),MONTH(data_pagamento_spesa) from spesa
            where MONTH(data_pagamento_spesa) = MONTH(SYSDATE())
            GROUP BY MONTH(data_pagamento_spesa)";
    $risultato_query = $mysqli->query($sql);
    $ris = $risultato_query->fetch_row();
    chiudi_connessione($mysqli);
    return $ris[0];
}
