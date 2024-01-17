<?php
        session_start();

        class Conectar{
            protected $dbh;

            protected function Conexion(){
                try{
                    $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=grupoccimacom_ti1", "grupoccimacom_master","Gccima22.");
                    // $conexion=mysqli_connect('localhost','grupoccimacom_master','Gccima22.','grupoccimacom_ti1');
                    return $conectar;
                } catch (Exception $e) {
                    print "¡Error BD!: " .$e->getMessage()."<br/>";
                    die();
                }
            }

            public function set_names(){
                return $this->dbh->query("SET NAMES 'utf8'");
            }

            public function ruta(){
                return "https://ti.grupoccima.com/index.php";
            }
        }
?>