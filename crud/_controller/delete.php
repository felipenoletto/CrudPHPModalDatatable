<?php

    require_once("../_dao/crudDAO.php");
    require_once("../_dto/crudDTO.php");

    $id = $_POST["id"];

    $crudDTO = new CrudDTO();
    $crudDTO->setId($id);

    $crudDAO = new CrudDAO();
    $result = $crudDAO->delete($id);

    if($result) {
        echo "<script>window.location.href='../_view/main.php';</script>";
    } else {
        echo "<script>window.location.href='../_view/main.php';</script>";
    }

?>