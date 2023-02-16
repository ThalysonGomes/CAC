<?php
class Conn {
    private static $Host = 'mairla.postgresql.dbaas.com.br';
    private static $User = 'mairla';
    private static $Pass = 'Xlows.147852@';
    private static $Port = '5432';
    private static $Dbsa = 'mairla';
    // private static $Host = '177.153.229.10';
    // private static $User = 'redebioclinica';
    // private static $Pass = '061yfmtx7obwzkk';
    // private static $Port = '17000';
    // private static $Dbsa = 'bioclinica';

    /** @var PDO */
    private static $Connect = null;
    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'pgsql:host=' . self::$Host . ';port='.self::$Port.';dbname=' . self::$Dbsa;
                self::$Connect = new PDO($dsn, self::$User, self::$Pass);
            endif;
        } catch (PDOException $e) {
            echo $e->getCode().', '. utf8_encode($e->getMessage()).','. $e->getFile().','. $e->getLine();
            die;
        }
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    public static function getConn() {
        return self::Conectar();
        
    }

    public function alterabanco($banco){
        self::$Dbsa = $banco;
    }

    public function Disconnect(){
       self::$Connect = null;
   }
}
?>