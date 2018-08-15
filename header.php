<?php
    require('definitions.php');
    require('function/db_operations.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestione Spese</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="http://gestionespese.dev.loc">Gestione Spese</a>
    <form class="form-inline" method="post" action="inserisci_spesa.php">
        <h2 class="totale-mese">Totale spese mese di <?php echo date('Y/m'); ?>: <?php echo number_format(somma_totale_spese_mese(),2); ?> €</h2>
        <h2 class="totale">Totale spese: <?php echo number_format(somma_totale_spese(),2); ?> €</h2>
        <button class="btn btn-success in-alto" type="submit">Nuova Spesa</button>
    </form>
</nav>
<!-- start body content -->