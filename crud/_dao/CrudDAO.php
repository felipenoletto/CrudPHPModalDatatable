<?php

    require_once("../_interface/ICrud.php");
    require_once("../_config/DB.php");

    class CrudDAO implements ICrud {

        public function insert($crudDTO) {

            $nome = $crudDTO->getNome();
            $sobrenome = $crudDTO->getSobrenome();
            $idade = $crudDTO->getIdade();

            try {
            
                $sql = "INSERT INTO registro(nome, sobrenome, idade) VALUES(:nome, :sobrenome, :idade)";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
                $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
                $stmt->bindParam(":idade", $idade, PDO::PARAM_INT);
                
                return $stmt->execute();
            
            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

        public function update($crudDTO) {

            $id = $crudDTO->getId();
            $nome = $crudDTO->getNome();
            $sobrenome = $crudDTO->getSobrenome();
            $idade = $crudDTO->getIdade();

            try {
            
                $sql = "UPDATE registro SET nome = :nome, sobrenome = :sobrenome, idade = :idade WHERE id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
                $stmt->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
                $stmt->bindParam(":idade", $idade, PDO::PARAM_INT);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                return $stmt->execute();

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
    
        public function readAll() {

            try {

                //$sql = "SELECT id, nome, sobrenome, idade FROM registro";
                $sql = "SELECT * FROM registro";
                $stmt = DB::prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll();

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
    
        public function readById($id) {

            try {

                $sql = "SELECT id, nome, sobrenome, idade FROM registro WHERE id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch();

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
    
        public function delete($id) {

            try {

                $sql = "DELETE FROM registro WHERE id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                
                return $stmt->execute();

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

?>