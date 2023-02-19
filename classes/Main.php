<?php 
    include "DB.php";

    abstract class Main{
        // datbase table data
        protected $table;

        /** Data read / Data Insert */
        public function readAll(){
            $sql = "SELECT * FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        /** Data Edit */
        public function readById($id){
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        }

        /** Data Delete */
        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        /** Overide Data insert/update */
        abstract public function insert();
        abstract public function update($id);


    }

?>