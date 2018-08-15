<?php

require_once 'classes/Spesa.php';
require_once 'definitions.php';
require_once 'function/validazione.php';
require_once 'function/db_operations.php';

// campi che arrivano del form di modifica
$id_spesa = '';
$nuovo_titolo_spesa = '';
$nuova_tipologia_spesa = '';
$nuova_data_pagamento_spesa = '';
$nuova_data_scadenza_spesa = '';
$nuovo_autore_spesa = '';
$nuovo_importo_spesa = '';

//validazione e verifica dei campi arrivati
if(isset($_POST['titolo'])){
    $nuovo_titolo_spesa = $_POST['titolo'];
}
if(isset($_POST['tipologia'])){
    $nuova_tipologia_spesa = $_POST['tipologia'];
}
if(isset($_POST['data_pagamento'])){
    $nuova_data_pagamento_spesa = converti_data_pagamento_spesa($_POST['data_pagamento']);
}
if(isset($_POST['data_scadenza'])){
    $nuova_data_scadenza_spesa = converti_data_scadenza_spesa($_POST['data_scadenza']);
}
if(isset($_POST['autore'])){
    $nuovo_autore_spesa = $_POST['autore'];
}
if(isset($_POST['importo'])){
    $nuovo_importo_spesa = $_POST['importo'];
}
if(isset($_POST['id_spesa'])){
    $id_spesa = $_POST['id_spesa'];
}

// se passa la verifica del titolo
if (verifica_titolo($nuovo_titolo_spesa) &&
    verifica_tipologia_spesa($nuova_tipologia_spesa) &&
    verifica_autore_spesa($nuovo_autore_spesa) &&
    verifica_importo_spesa($nuovo_importo_spesa))
{
    //crea l'oggetto nuova spesa
    $modifica_spesa = new Spesa($nuovo_titolo_spesa,$nuova_tipologia_spesa,$nuova_data_pagamento_spesa,$nuova_data_scadenza_spesa,$nuovo_autore_spesa,$nuovo_importo_spesa);
    //modifica record nel DB
    modifica_record($id_spesa,$modifica_spesa);
}else{
    //todo prevedere un messaggio di testo che avvisa dell'inserimento fallito
    header('Location:index.php');
}