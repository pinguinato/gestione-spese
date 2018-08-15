<?php


/**
 * @param $titolo_spesa
 * @return boolean
 */
function verifica_titolo($titolo_spesa){
    $ris = false;
    if (is_string($titolo_spesa) && (strlen($titolo_spesa) < MAX_LUNGHEZZA_TITOLO && strlen($titolo_spesa) > 0) ){
        $ris = true;
    }
    return $ris;
}

/**
 * @param $tipologia_spesa
 * @return bool
 */
function verifica_tipologia_spesa($tipologia_spesa){
    $ris = false;
    if (is_string($tipologia_spesa) && (strlen($tipologia_spesa) < MAX_LUNGHEZZA_TIPOLOGIA && strlen($tipologia_spesa) > 0) ){
        $ris = true;
    }
    return $ris;
}

/**
 * @param $autore_spesa
 * @return bool
 */
function verifica_autore_spesa($autore_spesa){
    $ris = false;
    if (is_string($autore_spesa) && (strlen($autore_spesa) < MAX_LUNGHEZZA_AUTORE_SPESA && strlen($autore_spesa) > 0) ){
        $ris = true;
    }
    return $ris;
}

/**
 * @param $importo_spesa
 * @return bool
 */
function verifica_importo_spesa($importo_spesa){
    $ris = false;
    $virgola = ',';
    $punto = '.';
    if(strpos($importo_spesa,$virgola)){
        // cambia la virgola in punto
        $importo_spesa = str_replace($virgola,$punto,$importo_spesa);
    }
    if(is_numeric($importo_spesa) && $importo_spesa >= 0){
        $ris = true;
    }

    if ($ris){
        return $importo_spesa;
    }

    return $ris;
}

/**
 * @param $data_pagamento
 * @return string
 */
function converti_data_pagamento_spesa($data_pagamento){
    $data_explode = explode("/",$data_pagamento);
    // converti formato data valido per db
    $data_pagamento_per_db = $data_explode[2].'-'.$data_explode[0].'-'.$data_explode[1];
    return $data_pagamento_per_db;
}

/**
 * @param $data_scadenza
 * @return string
 */
function converti_data_scadenza_spesa($data_scadenza){
    $data_explode = explode("/",$data_scadenza);
    // converti formato data valido per db
    $data_scadenza_per_db = $data_explode[2].'-'.$data_explode[0].'-'.$data_explode[1];
    return $data_scadenza_per_db;
}

/**
 * @param $data_pagamento
 * @return string
 */
function gira_data_pagamento_spesa($data_pagamento){
    //data che arriva dal DB in formato YYYY-mm-dd
    $data_explode = explode("-",$data_pagamento);
    // data valida per il frontend mm/gg/YYYY
    $data_pagamento_per_frontend = $data_explode[1].'/'.$data_explode[2].'/'.$data_explode[0];
    return $data_pagamento_per_frontend;
}

/**
 * @param $data_scadenza
 * @return string
 */
function gira_data_scadenza_spesa($data_scadenza){
    //data che arriva dal DB in formato YYYY-mm-dd
    $data_explode = explode("-",$data_scadenza);
    // data valida per il frontend mm/gg/YYYY
    $data_pagamento_per_frontend = $data_explode[1].'/'.$data_explode[2].'/'.$data_explode[0];
    return $data_pagamento_per_frontend;
}
