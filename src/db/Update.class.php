<?php
/*
 * Autor: Thalyson Gomes
 * Empresa: ©Bioinfo 
 * Description: Realiza Leituras, tanto completas quanto com filtros em qualquer tabela do banco conectado.
 * Obs: Para realizar o resultado chamar functon getResultado() ou getNumlinhas().
 */
class Update extends Conn {
    /* ########################
      ### Variaveis Privadas ###
      ######################## */
    private $Update;
    private $Dados;
    private $Tabela;
    private $Valores;
    private $Filtro;
    private $Query;
    private $Result;
    private $Conn;
    /* ########################
      #### Métodos Publicos ####
      ##########################
     */
    public function SetUpdate($Tabela, array $Dados, $Filtro, $Valores) {
        parse_str($Valores, $this->Valores);
        $this->Tabela = $Tabela;
        $this->Filtro = $Filtro;
        $this->Dados = $Dados;
        $this->getSyntax();
        $this->Executar();
    }
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Update);
    }
    public function getResultado() {
        return $this->Result;
    }
    private function getSyntax() {
        foreach ($this->Dados as $key => $value) {
            $Sets[] = $key . ' = :' . $key;
        }
        $Sets = implode(', ', $Sets);
        $this->Update = "UPDATE {$this->Tabela} SET {$Sets} {$this->Filtro}";
    }
    private function Executar() {
        $this->Connect();
        try {
            $this->Query->execute(array_merge($this->Dados, $this->Valores)) or die("Erro");
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result = null;
            die($e->getCode(). "<i class='fa fa-warning'></i> Erro ao realizar a leitura:". $e->getMessage(). $e->getFile(). $e->getLine());
        }
    }
}
?>