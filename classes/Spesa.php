<?php
/**
 * Created by PhpStorm.
 * User: Roberto Gianotto - gianottoroberto@gmail.com
 * Date: 03/06/2018
 * Time: 10:23
 */

class Spesa
{

    // caratteristiche
    //private $id;
    private $titolo_spesa;
    private $tipologia_spesa;
    private $data_pagamento_spesa;
    private $data_scadenza_spesa;
    private $autore_spesa;
    private $importo_spesa;

    /**
     * Costruttore della classe
     */
    public function __construct($titolo,$tipologia,$dataP,$dataS,$autore,$importo)
    {
        $this->titolo_spesa = $titolo;
        $this->tipologia_spesa = $tipologia;
        $this->data_pagamento_spesa = $dataP;
        $this->data_scadenza_spesa = $dataS;
        $this->autore_spesa = $autore;
        $this->importo_spesa = $importo;
    }

    // metodi GET

    /**
     * getTitoloSpesa
     */
    public function getTitoloSpesa(){
        return $this->titolo_spesa;
    }
    /**
     * getTipologiaSpesa
     */
    public function getTipologiaSpesa(){
        return $this->tipologia_spesa;
    }
    /**
     * getDataPagamentoSpesa
     */
    public function getDataPagamentoSpesa(){
        return $this->data_pagamento_spesa;
    }
    /**
     * getDataScadenzaSpesa
     */
    public function getDataScadenzaSpesa(){
        return $this->data_scadenza_spesa;
    }
    /**
     * getAutoreSpesa
     */
    public function getAutoreSpesa(){
        return $this->autore_spesa;
    }
    /**
     * getImportoSpesa
     */
    public function getImportoSpesa(){
        return $this->importo_spesa;
    }


    // metodi set

    /**
     * setTitoloSpesa
     */
    public function setTitoloSpesa($titolo){
        $this->titolo_spesa = $titolo;
    }
    /**
     * setTipologiaSpesa
     */
    public function setTipologiaSpesa($tipologia){
        $this->tipologia_spesa = $tipologia;
    }
    /**
     * setDataPagamentoSpesa
     */
    public function setDataPagamentoSpesa($dataP){
        $this->data_pagamento_spesa = $dataP;
    }
    /**
     * setDataScadenzaSpesa
     */
    public function setDataScadenzaSpesa($dataS){
        $this->data_scadenza_spesa = $dataS;
    }
    /**
     * setAutoreSpesa
     */
    public function setAutoreSpesa($autore){
        $this->autore_spesa = $autore;
    }
    /**
     * setImportoSpesa
     */
    public function setImportoSpesa($importo){
        $this->importo_spesa = $importo;
    }
}