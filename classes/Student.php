<?php 
include "DB.php";

    class Student{

        /** Data Select */ 
        private $table = 'tbl_student';

        public function readAll(){
            $sql = "SELECT * FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        /** Data Insert */
        private $name;
        private $dep;
        private $age;

        public function SetName($name){
            $this->name = $name;
        }

        public function SetDep($dep){
            $this->dep = $dep;
        }

        public function SetAge($age){
            $this->age = $age;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table(name, dep, age) VALUES (:name, :dep, :age)"; 
            $stmt = DB::prepare($sql); 
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':dep', $this->dep);
            $stmt->bindParam(':age', $this->age);
            return $stmt->execute();
        }

        /** Data Edit */
        public function readById($id){
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        }

        /** Data Update */
        public function update($id){
            $sql = "UPDATE $this->table SET name=:name, dep=:dep, age=:age WHERE id=:id";
            $stmt = DB::prepare($sql); 
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':dep', $this->dep);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        /** Data Delete */
        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }


    }




?>