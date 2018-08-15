<?php

require_once '../../classes/Spesa.php';

class SpesaTest extends PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $titolo_spesa = 'Spesa di prova';
        $tipologia_spesa = 'Descrizione della spesa di prova';
        $data_pagamento = '2018-05-15';
        $data_scadenza = '2018-06-16';
        $autore = 'Gianotto Roberto';
        $importo = 110.56;
        // obj Spesa
        $spesa = new Spesa($titolo_spesa,$tipologia_spesa,$data_pagamento,$data_scadenza,$autore,$importo);
        //getter
        $this->assertEquals('Spesa di prova',$spesa->getTitoloSpesa());
        $this->assertEquals('Descrizione della spesa di prova',$spesa->getTipologiaSpesa());
        $this->assertEquals('2018-05-15',$spesa->getDataPagamentoSpesa());
        $this->assertEquals('2018-06-16',$spesa->getDataScadenzaSpesa());
        $this->assertEquals('Gianotto Roberto',$spesa->getAutoreSpesa());
        $this->assertEquals(110.56,$spesa->getImportoSpesa());
        // setter
        $spesa->setTitoloSpesa('Nuovo titolo di spesa');
        $this->assertEquals('Nuovo titolo di spesa',$spesa->getTitoloSpesa());
        $spesa->setTipologiaSpesa('Nuova tipologia di spesa');
        $this->assertEquals('Nuova tipologia di spesa',$spesa->getTipologiaSpesa());
        $spesa->setDataPagamentoSpesa('2018-05-15');
        $spesa->setDataScadenzaSpesa('2018-06-16');
        $spesa->setAutoreSpesa('Stefania Vicentini');
        $spesa->setImportoSpesa(10.15);
        $this->assertEquals('2018-05-15',$spesa->getDataPagamentoSpesa());
        $this->assertEquals('2018-06-16',$spesa->getDataScadenzaSpesa());
        $this->assertEquals('Stefania Vicentini',$spesa->getAutoreSpesa());
        $this->assertEquals(10.15,$spesa->getImportoSpesa());
    }
}
