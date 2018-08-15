<?php

require_once 'function/db_operations.php';
// header.php
require("header_2.php");
?>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <h2>Inserimento nuova spesa</h2>
        </div>
    </div>
        <!-- form inserimento nuova spesa   -->
        <form action="risultato_inserimento.php" method="post" id="formInserimento">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="titolo_spesa">Titolo Spesa</label>
                    <input name="titolo" type="text" class="form-control" id="titoloSpesa" placeholder="Titolo spesa" value="" required>
                    <!--                <div class="valid-feedback">-->
                    <!--                    Il valore inserito risulta corretto-->
                    <!--                </div>-->
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="tipologia_spesa">Tipologia Spesa</label>
                    <input name="tipologia" type="text" class="form-control" id="tipologiaSpesa" placeholder="Tipologia spesa" value="" required>
                    <!--                <div class="valid-feedback">-->
                    <!--                    Il valore inserito risulta corretto-->
                    <!--                </div>-->
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="datapagamentospesa">Data pagamento spesa</label>
                    <div class="input-group date">
                        <input name="data_pagamento" type="text" class="form-control" value="" placeholder="mm/gg/YYYY" required>
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
                        <input name="data_scadenza" type="text" class="form-control" value="" placeholder="mm/gg/YYYY" required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="autore_spesa">Autore Spesa</label>
                    <input name="autore" type="text" class="form-control" id="autoreSpesa" placeholder="Autore spesa" value="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <label for="Importo_spesa">Importo Spesa in €</label>
                    <input name="importo" type="decimal" class="form-control" id="importSpesa" placeholder="Importo spesa" value="" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Inserisci spesa</button>
            <button type="button" class="btn btn-danger" onclick="tornaAllaIndex();">Annulla</button>
        </form>
</div>
<?php
// footer.php
require("footer.php");