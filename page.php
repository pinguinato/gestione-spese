<?php
require_once 'function/db_operations.php';

// array che serve per contenere i record della query
$arr = [];
if (isset($_GET['ordina'])){
    $ordinamento = $_GET['ordina'];
    //definisci gli ordinamenti per colonna
    if($ordinamento === 'id'){
        $arr = ordina_id();
    }elseif ($ordinamento === 'titolo'){
        $arr = ordina_nome();
    }elseif ($ordinamento === 'tipologia'){
        $arr = ordina_tipologia();
    }elseif ($ordinamento === 'autore'){
        $arr = ordina_autore();
    }elseif($ordinamento === 'importo'){
        $arr = ordina_importo();
    }elseif ($ordinamento === 'data_pagamento'){
        $arr = ordina_data_pagamento();
    }elseif ($ordinamento === 'data_scadenza'){
        $arr = ordina_data_scadenza();
    }else{
        $arr = mostra_tutti();
    }
}else{
    // se non c'è nessun ordinamento definito mostra
    // la query select * standard
    $arr = mostra_tutti();
}

//elimina un record
if(isset($_GET['elimina'])){
    $id_record_da_eliminare = $_GET['elimina'];

    if($id_record_da_eliminare > 0){

        elimina_record($id_record_da_eliminare);
        header('Location:index.php');
    }else{

        echo "Errore non puoi eliminare id " . $id_record_da_eliminare;
    }
}


?>
<div class="container">

    <table class="table table-striped" id="gestioneSpese">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITOLO</th>
                <th>TIPOLOGIA</th>
                <th>DATA PAGAMENTO</th>
                <th>DATA SCADENZA</th>
                <th>AUTORE</th>
                <th>IMPORTO</th>
                <th>AZIONI</th>
            </tr>
        </thead>
        <tbody>
    <?php
    // stampa a video dei risultati della query
    foreach ($arr as $k => $v){
        echo '<tr>';
        echo '<td>' . $v['id'] . '</td>' .
             '<td>' . $v['titolo_spesa'] . '</td>' .
             '<td>' . $v['tipologia_spesa'] . '</td>' .
             '<td>' . $v['data_pagamento_spesa'] . '</td>' .
             '<td>' . $v['data_scadenza_spesa'] . '</td>' .
             '<td>' . $v['autore_spesa'] . '</td>' .
             '<td>' . $v['importo_spesa'] . '</td>'.
             '<td>
                <a class="btn btn-primary" href="modifica_spesa.php?idSpesa='.$v['id'].'">Modifica</a>
                <a class="btn btn-danger" href="index.php?elimina='.$v['id'].'">Elimina</a>
             </td></tr>';
    }
    ?>
        </tbody>
    </table>

</div>