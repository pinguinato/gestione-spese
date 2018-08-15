<?php

require_once 'classes/Spesa.php';
require_once 'function/db_operations.php';
require_once 'function/validazione.php';
//header
require("header_2.php");

// dati della spesa
$id_spesa = '';
$titolo_spesa = '';
$tipologia_spesa = '';
$data_pagamento_spesa = '';
$data_scadenza_spesa = '';
$autore_spesa = '';
$importo_spesa = '';
// oggetto
$spesa_upd = '';

if (!empty($_GET['idSpesa']) && isset($_GET['idSpesa'])){

    $id_spesa = $_GET['idSpesa'];
    //esecuzione della query che reperisce la spesa
    $spesa_array = seleziona_spesa($id_spesa);
    // asseganzione dei campi per l'oggetto spesa
    $titolo_spesa = $spesa_array[0]["titolo_spesa"];
    $tipologia_spesa = $spesa_array[0]['tipologia_spesa'];
    $data_pagamento_spesa = $spesa_array[0]['data_pagamento_spesa'];
    $data_scadenza_spesa = $spesa_array[0]['data_scadenza_spesa'];
    $autore_spesa = $spesa_array[0]['autore_spesa'];
    $importo_spesa = $spesa_array[0]['importo_spesa'];

    //oggetto Spesa
    $spesa_upd = new Spesa(
            $titolo_spesa,
            $tipologia_spesa,
            $data_pagamento_spesa,
            $data_scadenza_spesa,
            $autore_spesa,
            $importo_spesa
    );
}
?>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <h2>Modifica Spesa</h2>
            </div>
        </div>
        <!-- form inserimento nuova spesa   -->
        <form action="risultato_modifica.php" method="post" id="formModifica">
            <input type="hidden" name="id_spesa" value="<?php echo $id_spesa; ?>">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="titolo_spesa">Titolo Spesa</label>
                    <input name="titolo" type="text" class="form-control" id="titoloSpesa" placeholder="Titolo spesa" value="<?php echo $spesa_upd->getTitoloSpesa(); ?>" required>
                    <!--                <div class="valid-feedback">-->
                    <!--                    Il valore inserito risulta corretto-->
                    <!--                </div>-->
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="tipologia_spesa">Tipologia Spesa</label>
                    <input name="tipologia" type="text" class="form-control" id="tipologiaSpesa" placeholder="Tipologia spesa" value="<?php echo $spesa_upd->getTipologiaSpesa(); ?>" required>
                    <!--                <div class="valid-feedback">-->
                    <!--                    Il valore inserito risulta corretto-->
                    <!--                </div>-->
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="datapagamentospesa">Data pagamento spesa</label>
                    <div class="input-group date">
                        <input name="data_pagamento" type="text" class="form-control" value="<?php echo gira_data_pagamento_spesa($spesa_upd->getDataPagamentoSpesa()); ?>" placeholder="mm/gg/YYYY" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="datascadenzaspesa">Data scadenza spesa</label>
                    <div class="input-group date">
                        <input name="data_scadenza" type="text" class="form-control" value="<?php echo gira_data_scadenza_spesa($spesa_upd->getDataScadenzaSpesa()); ?>" placeholder="mm/gg/YYYY" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="autore_spesa">Autore Spesa</label>
                    <input name="autore" type="text" class="form-control" id="autoreSpesa" placeholder="Autore spesa" value="<?php echo $spesa_upd->getAutoreSpesa(); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="Importo_spesa">Importo Spesa in €</label>
                    <input name="importo" type="decimal" class="form-control" id="importSpesa" placeholder="Importo spesa" value="<?php echo $spesa_upd->getImportoSpesa(); ?>" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modifica spesa</button>
            <button type="button" class="btn btn-danger" onclick="tornaAllaIndex()">Annulla</button>
        </form>
    </div>
<?php
// footer.php
require("footer.php");

