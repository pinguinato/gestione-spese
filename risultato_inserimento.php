<?php

require_once "classes/Spesa.php";
require_once "definitions.php";
require_once "function/validazione.php";
require_once "function/db_operations.php";

// campi del form
$titolo_spesa = '';
$tipologia_spesa = '';
$data_pagamento_spesa = '';
$data_scadenza_spesa = '';
$autore_spesa = '';
$importo_spesa = 0;


// validazione e verifica dei dati
if(isset($_POST['titolo'])){
    $titolo_spesa = $_POST['titolo'];
}
if(isset($_POST['tipologia'])){
    $tipologia_spesa = $_POST['tipologia'];
}
if(isset($_POST['data_pagamento'])){
    $data_pagamento_spesa = $_POST['data_pagamento'];
}
if(isset($_POST['data_scadenza'])){
    $data_scadenza_spesa = $_POST['data_scadenza'];
}
if(isset($_POST['autore'])){
    $autore_spesa = $_POST['autore'];
}
if(isset($_POST['importo'])){
    $importo_spesa = $_POST['importo'];
}

// se passa la verifica del titolo
if (verifica_titolo($titolo_spesa) &&
    verifica_tipologia_spesa($tipologia_spesa) &&
    verifica_autore_spesa($autore_spesa) &&
    verifica_importo_spesa($importo_spesa))
{
    //crea l'oggetto nuova spesa
    $nuova_spesa = new Spesa($titolo_spesa,$tipologia_spesa,$data_pagamento_spesa,$data_scadenza_spesa,$autore_spesa,$importo_spesa);
    //inserimento DB
    inserisci_record($nuova_spesa);
}else{
    //todo prevedere un messaggio di testo che avvisa dell'inserimento fallito
    header('Location:inserisci_spesa.php');
}








