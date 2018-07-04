<?php 

    interface ICrud {

        public function insert($crudDTO);
        public function update($crudDTO);
        public function readAll();
        public function readById($id);
        public function delete($id);

    }

?>