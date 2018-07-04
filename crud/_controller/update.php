<?php

    require_once("../_dao/crudDAO.php");
    require_once("../_dto/crudDTO.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $idade = $_POST["idade"];

    $crudDTO = new CrudDTO();
    $crudDTO->setId($id);
    $crudDTO->setNome($nome);
    $crudDTO->setSobrenome($sobrenome);
    $crudDTO->setIdade($idade);

    $crudDAO = new CrudDAO();
    $result = $crudDAO->update($crudDTO);

    if($result) {
        echo "<script>window.location.href='../_view/main.php';</script>";
    } else {
        echo "<script>window.location.href='../_view/main.php';</script>";
    }

?>