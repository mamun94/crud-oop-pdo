<?php 
/** Config database */
include "config.php";

    class DB{
        private static $pdo;
        
        public static function connection(){
            if(!isset(self::$pdo)){
                try {
                    self::$pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME,DB_USER,DB_PASSWORD);
                }catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            return self::$pdo;
        }

        //connection class ta acces korar jonno onno method use korlam. use kora easy hoi
        public static function prepare($sql){
            return self::connection()->prepare($sql);
        }

    }

?>